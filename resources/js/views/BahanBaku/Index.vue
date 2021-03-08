<template>
	<div>
		<div
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
							Move raw to <b>Gudang Sawmill</b>
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
							<!-- <div class="form-group">
								<label for="name" class="col-form-label">WAREHOUSE </label>

								<v-select
									@input="setWarehouse"
									:options="warehouse_option"
									label="title"
								>
									<template #list-footer>
										<div style="background: grey; height: 1px"></div>
										<div class="costum-footer-dropdown">
											<div>
												<li style="text-align: center; text-justify: center">
													<b-button
														@click="$router.push({ name: 'wrh.form' })"
														variant="primary"
														class="btn btn-xs"
														v-b-modal.modal-1
														>Add warehouse</b-button
													>
												</li>
											</div>
										</div>
									</template>
								</v-select>
								<div v-if="theErrors.name" class="mt-2 text-danger">
									{{ theErrors.name[0] }}
								</div>
							</div> -->
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
		</div>

		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Gudang</a></li>
				<li class="breadcrumb-item active" aria-current="page">index</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Index of raws in <b>Gudang Bahan Baku</b> </h6>
						<p class="card-description">
							Read the
							<a href="https://dreamywaze--myukm.000webhostapp.com/" target="_blank">
								User Guide</a
							> for more info
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
										value="size"
										id="kolomID"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomID">Size</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="series"
										id="kolomRef"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomRef">Series</label>
								</div>
							</div>
							<div class="grid-item-container-2 grid-item-2">
								<div class="justify-content-between">
									<b-button @click="toggleBusy" variant="success">
										<b-icon icon="arrow-clockwise" aria-hidden="true"></b-icon>
										Refresh
									</b-button>
								</div>
								<div>
									<b-button
										style="justify-content: end; justify-content: end"
										@click="$router.push({ name: 'bb.form' })"
										variant="primary"
									>
										<b-icon icon="plus-square" aria-hidden="true"></b-icon>
										Create Log
									</b-button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<b-table
								head-variant="light"
								hover
								show-empty
								responsive="sm"
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
								<template #cell(action)="info">
									<div class="grid-action-column">
										
											<router-link
												:to="{ name: 'home' }"
												class="badge badge-info"
												><b-icon icon="search"></b-icon
											></router-link>
										
										
											<router-link
												:to="{ name: 'home' }"
												class="badge badge-primary"
												>Edit</router-link
											>
										
										
											<a
											@click="setValue(info.item)"
											data-toggle="modal"
											data-target="#exampleModalCenter"
											class="badge badge-danger del-btn"
											>Move
										</a>
										
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
			form: {
				id: 0,
				uom: "m3",
				nop: 0,
				nop_virtual: 0,
			},
			nop_before: 1,
			theErrors: [],
			
			isBusy: false,
			
			raws: [],
			kolom: [
				{ key: "series", label: "Series", sortable: true },
				"type",
				{ key: "size", label: "Size", sortable: true },
				{ key: "periode", label: "Periode", sortable: true },
				"nop",
				"periode",
				"supplier",
				"invoice",
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
			btnLoading:false,
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
		setValue(value) {
			this.form.id = value.id;
			this.form.nop_virtual = value.nop;
			this.form.nop = value.nop;
			this.form.nop = value.nop;
			this.nop_before = value.nop;
		},
		onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-bahanbaku/index");
			this.raws = [];
			this.raws = data.data;
			this.totalRows = this.raws.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		verify() {
			this.btnLoading = true
			if (this.nop_before == 0) {
				this.$toast.warning("Stock is 0, please check afresh!", "Oops..", {
					position: "topRight",
				});
				this.btnLoading = false
			} else {
				this.form.nop = this.form.nop - this.form.nop_virtual;
				if (this.form.nop >= 0) {
					this.store();
					
				} else if (this.form.nop < 0) {
					this.$toast.error(
						"Out of stock, please check nop stock.",
						"Failed!,",
						{
							position: "topRight",
						}
					);
					this.form.nop = this.nop_before
					this.btnLoading = false
				}
			}
			// console.log("nop  = "+ this.form.nop);
			// console.log("nop before = "+ this.nop_before);
			// console.log("nop virtual = "+ this.form.nop_virtual);

		},
		async store() {
			try {
				let response = await axios.post(
					`/api/record/move/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					
					let { data } = await axios.get("/api/gudang-bahanbaku/index");
					this.raws = [];
					this.raws = data.data;
					this.totalRows = this.raws.length;
					console.log(this.form);
					$("#exampleModalCenter").modal("hide");
					this.btnLoading = false
					this.$toast.success("Raw has been successfully moved", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				this.btnLoading = false
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", { position: "topRight" });
			}
		},
	},
};
</script>