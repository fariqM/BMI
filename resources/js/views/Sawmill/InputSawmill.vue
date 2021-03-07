<template>
	<div>
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang sawmill</a></li>
				<li class="breadcrumb-item">
					<router-link :to="{ name: 'bb.index' }">Index</router-link>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Input record</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Index of input records in <b>Gudang Sawmill</b>
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
						<div class="header-controller-table">
							<div class="header-controller-table-1">
								<input
									placeholder="Search"
									class="costum-input"
									v-model="filter"
								/>
							</div>
							<div class="header-controller-table-2">
								<label class="costum-label-filter">Filter Kolom :</label>

								<input
									class="costum-checkbox"
									v-model="filterOn"
									value="nop"
									id="kolomID"
									type="checkbox"
								/>
								<label class="costum-checkbox" for="kolomID">Nop</label>

								<input
									class="costum-checkbox"
									v-model="filterOn"
									value="series"
									id="kolomRef"
									type="checkbox"
								/>
								<label class="costum-checkbox" for="kolomRef">Series</label>
							</div>
							<div class="header-controller-table-3">
								<div class="header-controller-table-3-1">
									<b-form-checkbox
										v-model="stockTable"
										switch
										size="lg"
									></b-form-checkbox>
									<span class="label-table-controller">Stock Table</span>
								</div>
								<div class="header-controller-table-3-2">

									<template v-if="stockTable == false">
										<b-button @click="toggleBusy" variant="success">
											<b-icon
												icon="arrow-clockwise"
												aria-hidden="true"
											></b-icon>
											Refresh Table
										</b-button>
									</template>

									<template v-if="stockTable">
										<b-button @click="getSawmillstock" variant="success">
											<b-icon
												icon="arrow-clockwise"
												aria-hidden="true"
											></b-icon>
											Refresh Table
										</b-button>
									</template>

								</div>
							</div>
						</div>
						<div class="table-responsive">
							<b-table
								head-variant="dark"
								hover
								show-empty
								
								bordered
								striped
								
								:per-page="perPage"
								:current-page="currentPage"
								:busy="isBusy"
								:filter="filter"
								@filtered="onFiltered"
								:filter-included-fields="filterOn"
								:items="raws"
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

								<template #cell(confirm_at)="data">
									<template v-if="data.item.confirm_at == null">
										Not set
									</template>
									<template v-if="data.item.confirm_at != null">
										{{ data.item.confirm_at }}
									</template>
								</template>

								<template #cell(status)="data">
									<template v-if="data.item.status == 'moving'">
										<span class="badge badge-dark">
											<b-icon
												class="costum-badge"
												icon="box-arrow-up-right"
											></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>
									<template v-if="data.item.status == 'on queue'">
										<span class="badge badge-info">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>
									<template v-if="data.item.status == 'stored'">
										<span class="badge badge-info">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() + " AT BMI-B" }}
										</span>
									</template>
									<template v-if="data.item.status == 'returned'">
										<span class="badge badge-info">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() + " AT BMI-A" }}
										</span>
									</template>
								</template>

								<template #cell(confirm_status)="data">
									<template v-if="data.item.confirm_status == 'unconfirmed'">
										<span class="badge badge-warning">
											<b-icon
												class="costum-badge"
												icon="exclamation-triangle-fill"
												variant="danger"
											></b-icon>
											{{ data.item.confirm_status.toUpperCase() }}
										</span>
									</template>
									<template v-if="data.item.confirm_status == 'confirmed'">
										<span class="badge badge-success">
											<b-icon
												class="costum-badge"
												icon="check2-square"
											></b-icon>
											{{ data.item.confirm_status.toUpperCase() }}
										</span>
									</template>
									<template v-if="data.item.confirm_status == 'mismatch'">
										<span class="badge badge-danger">
											<b-icon
												class="costum-badge"
												icon="exclamation-triangle-fill"
												variant="waring"
											></b-icon>
											{{ data.item.confirm_status.toUpperCase() }}
										</span>
									</template>
								</template>

								<template class="justify-content-between" #cell(action)="data">
									<router-link
										:to="{ name: 'home' }"
										class="badge badge-secondary"
										><b-icon icon="search"></b-icon
									></router-link>

									<template v-if="data.item.confirm_status == 'unconfirmed'">
										<a
											@click="confirm(data.item)"
											class="badge badge-success del-btn"
											>confirm</a
										>
										<a
											@click="mismatch(data.item)"
											class="badge badge-danger del-btn"
											>mismatch</a
										>
									</template>

									<template v-if="data.item.confirm_status == 'confirmed'">
										<a class="badge badge-primary del-btn">proceed</a>
									</template>
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
			stockTable: false,
			form: {
				id: "",
				nop: "",
				series: "",
			},
			isBusy: false,
			raws: [],
			kolom: [
				{ key: "series", label: "Series", sortable: true },
				{ key: "destination_name", label: "Destination", sortable: true },
				{ key: "nop", label: "NOP", sortable: true },
				{ key: "status", label: "Raw status", sortable: true },
				{ key: "confirm_status", label: "Confirmed status", sortable: true },
				{ key: "confirm_at", label: "Confirm at", sortable: true },
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
			theErrors: [],
			currentPage: 1,
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
	watch: {
		stockTable: function () {
			if (this.stockTable) {
				this.raws = [];
				this.kolom = [
					{ key: "series", label: "Series", sortable: true },
					{ key: "nop", label: "nop", sortable: true },
					{
						key: "structure_category",
						label: "Structure Category",
						sortable: true,
					},
					{ key: "periode", label: "Periode", sortable: true },
					{ key: "stock_action", label: "Action" },
				];
				this.getSawmillstock();
			} else {
				this.kolom = [
					{ key: "series", label: "Series", sortable: true },
					{ key: "destination_name", label: "Destination", sortable: true },
					{ key: "nop", label: "NOP", sortable: true },
					{ key: "status", label: "Raw status", sortable: true },
					{ key: "confirm_status", label: "Confirmed status", sortable: true },
					{ key: "confirm_at", label: "Confirm at", sortable: true },
					"action",
				];
				this.toggleBusy();
			}
		},
	},

	methods: {
		mismatch(value) {
			this.form.id = value.id;
			this.form.nop = value.nop;
			this.form.series = value.series;
			Vue.swal({
				title: "Confirm alert!",
				html: `are you sure the <b>${value.series}</b> series is correct ? <br>if you doubt please check manually the series.`,
				icon: "warning",
				confirmButtonText: `Store here`,
				showDenyButton: true,
				denyButtonText: "Return",
				denyButtonColor: "#FBBC06",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.stored();
					// console.log("stored");
					// this.konfirmAksi(value.id);
				} else if (result.isDenied) {
					this.returned();
				}
			});
		},
		async returned() {
			try {
				let response = await axios.patch(
					`/api/gudang-sawmill/mismatch-returned/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.$toast.success("Raws has been returned to BMI-A", "Done!", {
						position: "topRight",
					});
					this.refreshData();
				}
			} catch (e) {
				console.log(e.response.data.errors);
			}
		},
		async stored() {
			console.log(this.form);

			try {
				let response = await axios.patch(
					`/api/gudang-sawmill/mismatch-stored/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.$toast.success(
						"Raws has been added at your warehouse data",
						"Done!",
						{
							position: "topRight",
						}
					);
					this.refreshData();
				}
			} catch (e) {
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
				console.log(e.response.data.errors);
			}
		},
		confirm(value) {
			this.form.nop = value.nop;
			this.form.series = value.series;
			Vue.swal({
				title: "Confirm alert!",
				html: `are you sure the <b>${value.series}</b> series is correct ? <br>if you doubt please check manually the series.`,
				icon: "question",
				confirmButtonText: `Confirm`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					console.log();
					this.konfirmAksi(value);
				}
			});
		},
		async konfirmAksi(value) {
			// console.log(value);
			try {
				let response = await axios.patch(
					`/api/gudang-sawmill/confirm-raw/${value.id}`,
					this.form
				);
				if (response.status == 200) {
					this.$toast.success("Confirmed", "Done!", {
						position: "topRight",
					});
					this.refreshData();
				}
			} catch (e) {
				this.$toast.error("Something wrong", "Oops!", {
					position: "topRight",
				});

				console.log(e.response.data.errors);
			}
		},
		onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			this.raws = [];
			let { data } = await axios.get("/api/gudang-sawmill/input-index");
			this.raws = data.data;
			this.totalRows = this.raws.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
			// console.log(this.raws.length);
		},
		async refreshData() {
			this.raws = [];
			let { data } = await axios.get("/api/gudang-sawmill/input-index");
			this.raws = data.data;
			this.totalRows = this.raws.length;
		},
		async getSawmillstock() {
			this.isBusy = !this.isBusy;
			this.raws = [];
			let { data } = await axios.get("/api/gudang-sawmill/stock-index");
			this.raws = data.data;
			this.totalRows = this.raws.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
	},
};
</script>