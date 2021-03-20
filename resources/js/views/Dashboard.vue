<template>
	<div>
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Main Dashboard</h3>
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
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<apexchart
							id="MyChart18"
							type="bar"
							height="350"
							:options="chartOptions"
						></apexchart>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Stock raw <b>Master Data</b></h6>
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
								<div class="header-controller-table-3-1"></div>
								<div class="header-controller-table-3-2">
									<!-- <template v-if="stockTable == false">
										<b-button @click="toggleBusy" variant="success">
											<b-icon
												icon="arrow-clockwise"
												aria-hidden="true"
											></b-icon>
											Refresh Table
										</b-button>
									</template> -->

									<!-- <template v-if="stockTable">
										<b-button @click="getSawmillstock" variant="success">
											<b-icon
												icon="arrow-clockwise"
												aria-hidden="true"
											></b-icon>
											Refresh Table
										</b-button>
									</template> -->
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
			raws: [],
			btnLoading: false,
			isBusy: false,
			kolom: [
				{ key: "name", label: "name", sortable: true },
				{ key: "series", label: "Series", sortable: true },
				{ key: "tally", label: "tally", sortable: true },
				{ key: "warehouse", label: "warehouse", sortable: true },
				{ key: "status", label: "status", sortable: true },
				{ key: "size", label: "volume (m3)", sortable: true },
				{ key: "height", label: "height (m)", sortable: true },
				{ key: "length", label: "length (m)", sortable: true },
				{ key: "width", label: "width (m)", sortable: true },
				{ key: "status", label: "status", sortable: true },
				{ key: "confirm_status", label: "confirm status", sortable: true },
				{
					key: "structure_category",
					label: "structure category",
					sortable: true,
				},
				{ key: "type_name", label: "type", sortable: true },
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
			MasterStock: [],
			stock: [],
			stockChartAttr: [],
			g_sawmill: [],
			g_basah: [],
			g_kering: [],
			g_joint: [],
			g_bb: [],
			cek: [],
			g_coating: [],
			g_packing: [],
			dump: [],

			series: [
				{
					name: "PRODUCT A",
					data: [44, 55, 41, 67, 22, 43],
				},
				,
			],
			chartOptions: {
				chart: {
					height: 350,
					type: "bar",
					stacked: true,
					toolbar: {
						show: true,
					},
					zoom: {
						enabled: true,
					},
				},
				dataLabels: {
					enabled: false,
				},
				series: [],
				title: {
					text: "Raw Stock",
				},
				noData: {
					text: "Loading...",
				},
			},
		};
	},

	mounted() {
		this.getChartStock();
		this.toggleBusy();
		// this.updateChart();
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
	watch: {
		// stockTable: function () {
		// 	if (this.stockTable) {
		// 		this.raws = [];
		// 		this.kolom = [
		// 			{ key: "series", label: "Series", sortable: true },
		// 			{ key: "nop", label: "On Hand", sortable: true },
		// 			{ key: "processed", label: "Processed", sortable: true },
		// 			{
		// 				key: "structure_category",
		// 				label: "Structure Category",
		// 				sortable: true,
		// 			},
		// 			{ key: "periode", label: "Periode", sortable: true },
		// 			// { key: "stock_action", label: "Action" },
		// 		];
		// 		this.getSawmillstock();
		// 	} else {
		// 		this.kolom = [
		// 			{ key: "series", label: "Series", sortable: true },
		// 			{ key: "destination_name", label: "Destination", sortable: true },
		// 			{ key: "nop", label: "On Hand", sortable: true },
		// 			{ key: "status", label: "Raw status", sortable: true },
		// 			{ key: "confirm_status", label: "Confirmed status", sortable: true },
		// 			{ key: "confirm_at", label: "Confirm at", sortable: true },
		// 			"action",
		// 		];
		// 		this.toggleBusy();
		// 	}
		// },
	},

	methods: {
		coba() {
			console.log("dump ==> " + this.dump);
			// console.log(this.opsi);

			// console.log("categories = " + this.chartOptions.xaxis.categories);
		},
		updateChart() {
			const max = 90;
			const min = 20;
			const newData = this.series[0].data.map(() => {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			});
			// In the same way, update the series option
			this.series = [
				{
					data: newData,
				},
			];
			// console.log("tes = = " + this.g_kering);
		},
		async getChartStock() {
			let { data } = await axios.get("/api/dashboard/dashboard-stock-cart");
			this.stock = [];
			this.stock = data.data;

			var i = 0;
			this.stock.forEach((element) => {
				// if (element.stock !== null) {

				// }

				if (element.name == "GUDANG SAWMILL" && element.stock !== null) {
					this.g_sawmill[i] = element.data;
					this.dump[i] = element.stock;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.g_kering[i] = 0;
					this.g_basah[i] = 0;
					this.g_joint[i] = 0;
					this.g_bb[i] = 0;
					this.g_coating[i] = 0;
					this.g_packing[i] = 0;
				} else if (element.name == "GUDANG P BASAH" && element.stock !== null) {
					this.g_sawmill[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.g_kering[i] = 0;
					this.g_basah[i] = element.data;
					this.g_joint[i] = 0;
					this.g_bb[i] = 0;
					this.g_coating[i] = 0;
					this.g_packing[i] = 0;
					this.dump[i] = element.stock;
				} else if (
					element.name == "GUDANG P KERING" &&
					element.stock !== null
				) {
					this.g_sawmill[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.g_kering[i] = element.data;
					this.g_basah[i] = 0;
					this.g_joint[i] = 0;
					this.dump[i] = element.stock;
					this.g_bb[i] = 0;
					this.g_coating[i] = 0;
					this.g_packing[i] = 0;
				} else if (element.name == "GUDANG JOINT" && element.stock !== null) {
					this.g_sawmill[i] = 0;
					this.g_kering[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.dump[i] = element.stock;
					this.g_basah[i] = 0;
					this.g_joint[i] = element.data;
					this.g_bb[i] = 0;
					this.g_coating[i] = 0;
					this.g_packing[i] = 0;
				} else if (
					element.name == "GUDANG BAHAN BAKU" &&
					element.stock !== null
				) {
					this.g_sawmill[i] = 0;
					this.g_kering[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.g_basah[i] = 0;
					this.dump[i] = element.stock;
					this.g_joint[i] = 0;
					this.g_bb[i] = element.data;
					this.g_coating[i] = 0;
					this.g_packing[i] = 0;
				} else if (element.name == "GUDANG COATING" && element.stock !== null) {
					this.g_sawmill[i] = 0;
					this.g_kering[i] = 0;
					this.g_basah[i] = 0;
					this.g_joint[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.dump[i] = element.stock;
					this.g_bb[i] = 0;
					this.g_coating[i] = element.data;
					this.g_packing[i] = 0;
				} else if (element.name == "GUDANG PACKING" && element.stock !== null) {
					this.g_sawmill[i] = 0;
					this.g_kering[i] = 0;
					this.cek[i] =
						element.stock + " - " + element.data + " - " + element.name;
					this.dump[i] = element.stock;
					this.g_basah[i] = 0;
					this.g_joint[i] = 0;
					this.g_bb[i] = 0;
					this.g_coating[i] = 0;
					this.g_packing[i] = element.data;
				} else {
					i--;
				}
				i++;
			});

			console.log("cek = " + this.cek);
			console.log("dump = " + this.dump);
			console.log("p-basah = " + this.g_basah);
			console.log("p-kering = " + this.g_kering);
			console.log("joint = " + this.g_joint);
			var options = {
				chart: {
					height: 350,
					type: "bar",
					stacked: true,
					toolbar: {
						show: true,
					},
					zoom: {
						enabled: true,
					},
				},
				dataLabels: {
					enabled: false,
				},
				series: [],
				title: {
					text: "Raw Stock",
				},
				noData: {
					text: "Loading...",
				},
			};
			// this.chartOptions.xaxis.categories = ['asd10', 'asd10002']
			var chart = new ApexCharts(document.querySelector("#MyChart18"), options);

			chart.render();

			chart.updateOptions({
				xaxis: {
					labels: {
						show: true,
					},
					categories: this.dump,
				},
			});

			// example of series in another format
			chart.appendSeries({
				name: "Gudang Bahan Baku",
				data: this.g_bb,
			});
			chart.appendSeries({
				name: "Gudang SAwmill",
				data: this.g_sawmill,
			});
			chart.appendSeries({
				name: "Gudang Pembahanan Basah",
				data: this.g_basah,
			});
			chart.appendSeries({
				name: "Gudang Pembahanan Kering",
				data: this.g_kering,
			});
			chart.appendSeries({
				name: "Gudang Joint",
				data: this.g_joint,
			});
			chart.appendSeries({
				name: "Gudang Coating",
				data: this.g_coating,
			});
			chart.appendSeries({
				name: "Gudang Packing",
				data: this.g_packing,
			});
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			this.raws = [];
			let { data } = await axios.get("/api/dashboard/stock-master-admin-index");
			this.raws = data.data;
			this.totalRows = this.raws.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
			// console.log(this.raws.length);
		},
		async refreshData() {
			let { data } = await axios.get("/api/dashboard/stock-master-admin-index");
			this.raws = data.data;
			this.totalRows = this.raws.length;
		},
		onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
	},
};
</script>

<style>
</style>