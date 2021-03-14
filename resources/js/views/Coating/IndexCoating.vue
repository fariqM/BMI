<template>
	<div>
		

		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang Coating</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Process Index
				</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Process Control In <b>Gudang Coating</b>
						</h6>
						<p class="card-description">
							Read the
							<a
								href="https://dreamywaze--myukm.000webhostapp.com/"
								target="_blank"
							>
								User Guide</a
							>
							for more info
						</p>
						<div class="grid-container">
							<div class="grid-item-container grid-item-1">
								<div class="grid-subitem-1">
									<input
										placeholder="Search"
										class="costum-input"
										v-model="filter"
									/>
								</div>
								<div class="grid-subitem-2">
									<label class="costum-label-filter">Filter Kolom :</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="tally"
										id="kolomID"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomID">Tally</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="name"
										id="kolomRef"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomRef">Name</label>
								</div>
							</div>
							<div class="grid-item-container-2 grid-item-2">
								<div class="justify-content-between">
									<b-button @click="toggleBusy" variant="success">
										<b-icon icon="arrow-clockwise" aria-hidden="true"></b-icon>
										Refresh
									</b-button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<b-table
								head-variant="light"
								show-empty
								fixed
								bordered
								:per-page="perPage"
								:current-page="currentPage"
								:busy="isBusy"
								:filter="filter"
								@filtered="onFiltered"
								:filter-included-fields="filterOn"
								:items="process"
								:fields="kolom"
								:sort-by.sync="sortBy"
								:sort-desc.sync="sortDesc"
								><template #table-busy>
									<div class="text-center text-danger my-1">
										<svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink"
											style="
												margin: auto;
												background: none;
												display: block;
												shape-rendering: auto;
											"
											width="100px"
											height="100px"
											viewBox="0 0 100 100"
											preserveAspectRatio="xMidYMid"
										>
											<path
												d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50"
												fill="#93dbe9"
												stroke="none"
											>
												<animateTransform
													attributeName="transform"
													type="rotate"
													dur="1s"
													repeatCount="indefinite"
													keyTimes="0;1"
													values="0 50 51;360 50 51"
												></animateTransform>
											</path>
										</svg>
									</div>
								</template>

								<template #cell(status)="data">
									<template v-if="data.item.status == 'coating process'">
										<span class="badge badge-pill badge-success">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>

									<template v-if="data.item.status == 'finished on BMI-E'">
										<span class="badge badge-pill badge-success">
											<b-icon
												class="costum-badge"
												icon="check2-square"
											></b-icon>
											FINISHED
										</span>
									</template>
								</template>

								<template #cell(action)="info">
									<div class="grid-action-column">
										<template v-if="info.item.status == 'finished on BMI-E'">
											<a
												@click="cek(info.item)"
												class="badge badge-info del-btn"
												><b-icon icon="search"></b-icon>
											</a>

                      <a
													@click="PackingStage(info.item)"
													class="badge badge-secondary del-btn"
												>
													PACKING
											</a>
										</template>

										<template v-if="info.item.status == 'coating process'">
											<a
												@click="finishCoating(info.item)"
												class="badge badge-success del-btn"
												>FINISH</a
											>
											<a
												@click="cancelCoating(info.item)"
												class="badge badge-warning del-btn"
											>
												CANCEL
											</a>
										</template>
									</div>
								</template>
								<template #row-details="data">
									<div>
										<div class="table-responsive">
											<b-table
												small
												fixed
												show-empty
												table-variant="info"
												head-variant="dark"
												:fields="ExtenColumn"
												:items="[data.item.stockprofile]"
											>
												<template #cell(action)="">
												 <b>NOT ALLOWED</b>
												</template>
											</b-table>
										</div>
									</div>
								</template>
							</b-table>
						</div>
						<hr />
						<div class="footer-table-container">
							<div class="footer-table-container-item1">
								Pagination :
								<select
									class="custom-select custom-select-sm form-control"
									id="per-page-select"
									v-model="perPage"
									:options="pageOptions"
								>
									<template v-for="pagess in pageOptions">
										<option :key="pagess.value" :value="pagess.value">
											{{ pagess.text }}
										</option>
									</template>
								</select>
							</div>
							<div class="footer-table-container-item2">
								<!-- <button class="btn btn-primary">ASas</button> -->
								<b-pagination
									v-model="currentPage"
									:total-rows="totalRows"
									:per-page="perPage"
									size="sm"
									class="my-0"
								></b-pagination>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
export default {
	data() {
		return {
			Condition: false,
			btnLoading: false,
			form: {
				sawmillrun_id: "",
				structure_category: "",
				type_id: "",
				size: "",
				warehouse_id: "",
				height: 0,
				width: 0,
				length: 0,
				id: "",
				nop: "",
				series: "",
			},
			theErrors: [],
			isBusy: false,
			extendable: [],
			process: [],
			kolom: [
				{ key: "name", label: "Name", sortable: true },
				{ key: "tally", label: "tally", sortable: true },
				{ key: "length", label: "length", sortable: true },
				{ key: "width", label: "width", sortable: true },
				{ key: "height", label: "height", sortable: true },
				{ key: "size", label: "volume", sortable: true },
				{ key: "status", label: "status", sortable: true },
				"action",
			],
			ExtenColumn: [
				{ key: "height", label: "height profile (cm)", sortable: true },
				{ key: "width", label: "width profile (cm)", sortable: true },
				{ key: "length", label: "length profile (cm)", sortable: true },
				{ key: "size", label: "volume profile (cm3)", sortable: true },
				"action",
			],
			sortBy: "",
			sortDesc: false,
			filter: null,
			filterOn: [],
			perPage: 5,
			pageOptions: [
				{ value: 5, text: "5" },
				{ value: 10, text: "10" },
				{ value: 15, text: "15" },
				{ value: 100, text: "Show a lot" },
			],
			totalRows: 1,
			currentPage: 1,
			btnLoading: false,
		};
	},

	computed: {
		sortOptions() {
			return this.fields
				.filter((f) => f.sortable)
				.map((f) => {
					return { text: f.label, value: f.key };
				});
		},
	},

	mounted() {
		this.toggleBusy();
	},

	methods: {
		cancelCoating(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			Vue.swal({
				title: `Attention!`,
				html: `are you sure want to cancel coating process the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to moulding process?`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.cancelMouldingAction();
				}
			});
		},
		async cancelMouldingAction() {
			try {
				let response = await axios.patch(
					`/api/gudang-coating/rollback/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				console.log(e);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		finishCoating(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			this.form.tally = value.tally;
			Vue.swal({
				title: "Finish Alert",
				html: `are you sure want to finish coating process of the <b>${this.form.name}</b> - <b>${this.form.tally}</b> ?`,
				icon: "question",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.finishCoatingAction();
				}
			});
		},
		async finishCoatingAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-coating/finish-coating/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				console.log(e);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		PackingStage(value) {
			this.form.name = value.name;
			this.form.tally = value.tally;
			this.form.id = value.id;
			Vue.swal({
				title: "Next stage is PACKING stage",
				html: `are you sure want move the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to PACKING warehouse ?`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.PackingStageAction();
				}
			});
		},
		async PackingStageAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-coating/move-to-packing/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				console.log(e);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},

		setEditForm(value) {
			this.form.name = value.name;
			this.form.tally = value.tally;
			this.form.length = value.length;
			this.form.width = value.width;
			this.form.height = value.height;
			this.form.id = value.id;
		},
		
		cek(value) {
			value._showDetails = !value._showDetails;
		},
		
		finish(value) {
			this.form.id = value.id;
		},

		rollback(value) {
			this.form.id = value.id;
			Vue.swal({
				title: "Rollback Confirm",
				html: `are you sure want to cancel this process on <b>${value.series}</b>`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.rollbackAction();
				}
			});
		},
		async rollbackAction() {
			try {
				let response = await axios.patch(
					`/api/gudang-coating/rollback/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.$toast.success("Rollback success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				console.log(e);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		onFiltered(filteredItems) {
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-coating/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async refreshTable() {
			let { data } = await axios.get("/api/gudang-coating/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
		},
	},
};
</script>