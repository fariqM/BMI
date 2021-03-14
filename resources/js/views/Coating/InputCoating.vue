<template>
	<div>
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang Coating</a></li>

				<li class="breadcrumb-item active" aria-current="page">Input index</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Index of Log in <b>Gudang Coating</b></h6>
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
								fixed
								show-empty
								striped
								head-variant="dark"
								:fields="kolom"
								:items="stocks"
								:per-page="perPage"
								:current-page="currentPage"
								:busy="isBusy"
								:filter="filter"
								@filtered="onFiltered"
								:filter-included-fields="filterOn"
								:sort-by.sync="sortBy"
								:sort-desc.sync="sortDesc"
							>
								<template #table-busy>
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

								<template #cell(action)="data">
									<template v-if="data.item.confirm_status != 'confirmed'">
										<a
											@click="confirm(data.item)"
											class="badge badge-success del-btn"
											>CONFIRM</a
										>
									</template>

								</template>
							</b-table>
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
			isBusy: false,
			sortBy: "confirm_status",
			sortDesc: true,
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
			stocks: [],
			kolom: [
				{ key: "name", label: "Name", sortable: true },
				{ key: "series", label: "series", sortable: true },
				{ key: "tally", label: "tally", sortable: true },
				{ key: "size", label: "volume", sortable: true },
				{ key: "status", label: "status", sortable: true },
				{ key: "confirm_status", label: "Confirm Status", sortable: true },
				"action",
			],
			form: {
				id: "",
				name: "",
				status: "",
				confirm_status: "",
				series: "",
				tally: "",
				warehouse_id: "",
			},
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
		rollback(value) {
			this.form.id = value.id;
			Vue.swal({
				title: "Rollback alert!",
				html: `Are you sure to rollback the <b>${value.name}</b> - <b>${value.tally}</b> form your process ?`,
				icon: "question",
				confirmButtonText: `Confirm`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					// console.log();
					this.confirmAction();
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
					this.$toast.success("Confirmed", "Done!", {
						position: "topRight",
					});
					this.refreshTable();
				}
			} catch (e) {
				this.$toast.error("Something wrong", "Oops!", {
					position: "topRight",
				});
				console.log(e);
			}
		},

		confirm(value) {
			console.log(value);
			this.form.id = value.id;
			Vue.swal({
				title: "Confirm alert!",
				html: `Are you sure to confirm the <b>${value.name}</b> - <b>${value.tally}</b> and store to your warehouse ?`,
				icon: "question",
				confirmButtonText: `Confirm`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					// console.log();
					this.confirmAction();
				}
			});
		},

		async confirmAction() {
			try {
				let response = await axios.patch(
					`/api/gudang-coating/confirm/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.$toast.success("Confirmed", "Done!", {
						position: "topRight",
					});
					this.refreshTable();
				}
			} catch (e) {
				this.$toast.error("Something wrong", "Oops!", {
					position: "topRight",
				});
				console.log(e);
			}
		},

		onFiltered(filteredItems) {
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-coating/input-index");
			this.stocks = [];
			this.stocks = data.data;
			this.totalRows = this.stocks.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async refreshTable() {
			let { data } = await axios.get("/api/gudang-coating/input-index");
			this.stocks = [];
			this.stocks = data.data;
			this.totalRows = this.stocks.length;
		},
	},
};
</script>

<style>
</style>