<template>
	<div>
		<!-- <div
			class="modal fade"
			id="exampleModalCenter"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Raw Manufacturing at <b>Gudang Sawmill</b>
						</h5>
						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" @submit.prevent="verify">
							<div class="form-group">
								<label for="nop" class="col-form-label">NOP</label>
								<input
									type="number"
									v-model="form.nop_virtual"
									class="form-control"
									placeholder="Number of Pieces"
								/>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="verify"
							type="submit"
							class="btn btn-primary custom-button-animate"
						>
							<div class="custom-button-animate-item1">
								<template v-if="btnLoading">
									<svg
										xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink"
										style="
											margin: auto;
											background: none;
											display: block;
											shape-rendering: auto;
										"
										width="28px"
										height="28px"
										viewBox="0 0 100 100"
										preserveAspectRatio="xMidYMid"
									>
										<circle
											cx="50"
											cy="50"
											r="0"
											fill="none"
											stroke="#26232b"
											stroke-width="8"
										>
											<animate
												attributeName="r"
												repeatCount="indefinite"
												dur="0.6896551724137931s"
												values="0;40"
												keyTimes="0;1"
												keySplines="0 0.2 0.8 1"
												calcMode="spline"
												begin="0s"
											></animate>
											<animate
												attributeName="opacity"
												repeatCount="indefinite"
												dur="0.6896551724137931s"
												values="1;0"
												keyTimes="0;1"
												keySplines="0.2 0 0.8 1"
												calcMode="spline"
												begin="0s"
											></animate>
										</circle>
										<circle
											cx="50"
											cy="50"
											r="0"
											fill="none"
											stroke="#6b3f20"
											stroke-width="8"
										>
											<animate
												attributeName="r"
												repeatCount="indefinite"
												dur="0.6896551724137931s"
												values="0;40"
												keyTimes="0;1"
												keySplines="0 0.2 0.8 1"
												calcMode="spline"
												begin="-0.3448275862068966s"
											></animate>
											<animate
												attributeName="opacity"
												repeatCount="indefinite"
												dur="0.6896551724137931s"
												values="1;0"
												keyTimes="0;1"
												keySplines="0.2 0 0.8 1"
												calcMode="spline"
												begin="-0.3448275862068966s"
											></animate>
										</circle>
									</svg>
								</template>
							</div>
							<div class="custom-button-animate-item2">Move</div>
						</button>
						<button
							type="button"
							class="btn btn-secondary"
							data-dismiss="modal"
						>
							Close
						</button>
					</div>
				</div>
			</div>
		</div> -->

		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang sawmill</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Raw Manufacturing
				</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Manufacturing Control In <b>Gudang Bahan Baku</b>
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
										value="series"
										id="kolomID"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomID">Series</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="nop"
										id="kolomRef"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomRef">Amount</label>
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
									<template v-if="data.item.status == 'processed'">
										<span class="badge badge-pill badge-success">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>
								</template>

								<template #cell(action)="info">
									<div class="grid-action-column">
										<a @click="cek(info.item)" class="badge badge-info del-btn"
											><b-icon icon="search"></b-icon
										></a>

										<template @click="finish(info.item)" v-if="info.item.status == 'processed'">
											<a class="badge badge-success del-btn">FINISH</a>
										</template>

										<template v-if="info.item.status == 'processed'">
											<a
												@click="rollback(info.item)"
												class="badge badge-warning del-btn"
												>ROLLBACK</a
											>
										</template>
									</div>
								</template>

								<template #row-details="data">
									<div>
										<div class="table-responsive">
											<b-table
												fixed
												small
												table-variant="info"
												head-variant="dark"
												:fields="ExtenColumn"
												:items="[data.item.supplier]"
											></b-table>
										</div>
										<!-- <div class="col-md-12 grid-margin stretch-card">
											<div class="card">
												<div class="card-body">
													
												</div>
											</div>
										</div> -->
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
			form: {},
			theErrors: [],
			isBusy: false,
			process: [],
			extendable: [],
			kolom: [
				{ key: "series", label: "Series", sortable: true },
				{ key: "nop", label: "Amount", sortable: true },
				{ key: "structure_category", label: "Category", sortable: true },
				{ key: "status", label: "Status", sortable: true },
				"action",
			],
			ExtenColumn: ["name", "shortname", "address", "owner", "email", "action"],
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
		finish(value){
			console.log(value);
		},
		push(value) {
			return [].push(value.supplier);
		},
		cek(value) {
			console.log(value);
			value._showDetails = !value._showDetails;
			// this.extendable.push(value.supplier);
		},
		rollback(value) {
			this.form = value;
			// console.log(this.form);
			Vue.swal({
				title: "Rollback Confirm",
				html: `are you sure want cancel this process on <b>${value.series}</b>`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					// console.log(value.sawmillstock_id.id);
					// console.log(this.form);
					this.rollbackAction();
				}
			});
		},
		async rollbackAction() {
			try {
				let response = await axios.patch(
					`/api/gudang-sawmill/rollback-process/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.$toast.success("Successfully processing", "Done!", {
						position: "topRight",
					});
					this.form = {};
				}
			} catch (e) {
				console.log(e.response);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-sawmill/process-index");
			this.process = [];
			this.process = data.data;
			// this.process.forEach((element) => {
			// 	this.extendable.push(element.supplier);
			// });
			this.totalRows = this.process.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async store() {
			try {
			} catch (e) {
				this.btnLoading = false;
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		async refreshTable() {
			let { data } = await axios.get("/api/gudang-sawmill/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
		},
	},
};
</script>