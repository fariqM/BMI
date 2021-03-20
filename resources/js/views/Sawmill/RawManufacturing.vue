<template>
	<div>
		<!-- Modal for Create Form -->
		<div
			class="modal fade"
			id="StockFormModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Create stock
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
						<form method="post" @submit.prevent="addstock">
							<div class="form-group">
								<label for="nop" class="col-form-label">Series</label>
								<input
									v-model="form.series"
									readonly
									type="text"
									class="form-control form-control-sm"
								/>

								<label for="typeProductCreate" class="col-form-label"
									>Type Product</label
								>
								<select
									v-model="form.type_id"
									class="form-control form-control-sm"
									name="TypeProduct"
									id="typeProductCreate"
								>
									<option
										v-for="data in typeProduct"
										:key="data.id"
										:value="data.id"
									>
										{{ data.name }}
									</option>
								</select>
								<div v-if="theErrors.type_id" class="mt-2 text-danger">
									{{ theErrors.type_id[0] }}
								</div>

								<label for="nop" class="col-form-label">Height (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="form.height"
									class="form-control form-control-sm"
									placeholder="Height in meters"
								/>
								<div v-if="theErrors.height" class="mt-2 text-danger">
									{{ theErrors.height[0] }}
								</div>

								<label for="nop" class="col-form-label">width (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="form.width"
									class="form-control form-control-sm"
									placeholder="Width in meters"
								/>
								<div v-if="theErrors.width" class="mt-2 text-danger">
									{{ theErrors.width[0] }}
								</div>

								<label for="nop" class="col-form-label">length (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="form.length"
									class="form-control form-control-sm"
									placeholder="Length in meters"
								/>

								<div v-if="theErrors.length" class="mt-2 text-danger">
									{{ theErrors.length[0] }}
								</div>

								<label for="nop" class="col-form-label">PCS</label>
								<input
									type="number"
									step="1"
									v-model="form.pcs"
									class="form-control form-control-sm"
									placeholder="Number of pieces"
								/>

								<div v-if="theErrors.pcs" class="mt-2 text-danger">
									{{ theErrors.pcs[0] }}
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="addstock"
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
							<div class="custom-button-animate-item2">Submit</div>
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

		<!-- Modal for Edit Form -->
		<div
			class="modal fade"
			id="EditFormModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Edit stock</h5>
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
						<form method="post" @submit.prevent="EditStock">
							<div class="form-group">
								<label for="TypeProduct" class="col-form-label"
									>Type Product</label
								>
								<select
									v-model="Editform.type_id"
									name="TypeProduct"
									id="typeProduct"
								>
									<option
										v-for="data in typeProduct"
										:key="data.id"
										:value="data.id"
									>
										{{ data.name }}
									</option>
								</select>
								<div v-if="theErrors.type_id" class="mt-2 text-danger">
									{{ theErrors.type_id[0] }}
								</div>

								<label for="nop" class="col-form-label">Height (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="Editform.height"
									class="form-control form-control-danger"
									placeholder="Height in meters"
								/>
								<div v-if="theErrors.height" class="mt-2 text-danger">
									{{ theErrors.height[0] }}
								</div>

								<label for="nop" class="col-form-label">width (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="Editform.width"
									class="form-control"
									placeholder="Width in meters"
								/>
								<div v-if="theErrors.width" class="mt-2 text-danger">
									{{ theErrors.width[0] }}
								</div>

								<label for="nop" class="col-form-label">length (meters)</label>
								<input
									type="number"
									step="0.001"
									v-model="Editform.length"
									class="form-control"
									placeholder="Length in meters"
								/>
								<div v-if="theErrors.length" class="mt-2 text-danger">
									{{ theErrors.length[0] }}
								</div>

								<label for="nop" class="col-form-label">PCS</label>
								<input
									type="number"
									step="1"
									v-model="Editform.pcs"
									class="form-control form-control-sm"
									placeholder="Number of pieces"
								/>

								<div v-if="theErrors.pcs" class="mt-2 text-danger">
									{{ theErrors.pcs[0] }}
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="EditStock"
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
							<div class="custom-button-animate-item2">Save</div>
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

		<!-- Modal Proceed to -->
		<div
			class="modal fade"
			id="MoveProcessModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Process {{ Editform.name }} - {{ Editform.tally }} to
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
						<form method="patch" @submit.prevent="ProcessTo">
							<div class="form-group">
								<label for="TypeProduct" class="col-form-label"
									>Warehouse</label
								>
								<select
									v-model="Editform.warehouse_id"
									name="TypeProduct"
									id="typeProduct"
								>
									<option value="2">PEMBAHANAN BASAH</option>
									<option value="3">PEMBAHANAN KERING</option>
								</select>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="ProcessTo"
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
							<div class="custom-button-animate-item2">Save</div>
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
									<template v-if="data.item.status == 'finished'">
										<span class="badge badge-pill badge-success">
											<b-icon
												class="costum-badge"
												icon="check2-square"
											></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>

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

										<template v-if="info.item.status == 'finished'">
											<a
												@click="CreateModal(info.item)"
												data-toggle="modal"
												data-target="#StockFormModal"
												class="badge badge-primary del-btn"
												>CREATE STOCK</a
											>
										</template>

										<template v-if="info.item.status == 'processed'">
											<a
												@click="finish(info.item)"
												class="badge badge-success del-btn"
												>FINISH</a
											>
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
												small
												fixed
												show-empty
												table-variant="info"
												head-variant="dark"
												:fields="ExtenColumn"
												:items="data.item.stocks"
											>
												<template #cell(action)="data">
													<a
														data-toggle="modal"
														data-target="#EditFormModal"
														@click="setEditForm(data.item)"
														class="badge badge-primary del-btn"
														>EDIT</a
													>

													<template v-if="data.item.status === null">
														<a
															@click="setEditForm(data.item)"
															data-toggle="modal"
															data-target="#MoveProcessModal"
															class="badge badge-secondary del-btn"
														>
															PROCESS TO
														</a>
													</template>
												</template>

												<template #cell(status)="data">
													<template v-if="data.item.status === null">
														<span class="badge badge-pill badge-dark">
															<b-icon
																class="costum-badge"
																icon="question-diamond"
															></b-icon>
															NOT SET
														</span>
													</template>

													<template v-if="data.item.status !== null">
														<span class="badge badge-pill badge-success">
															<b-icon
																class="costum-badge"
																icon="clock"
															></b-icon>
															PROCESSED
														</span>
													</template>
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
			widthError: true,
			heightError: true,
			lengthError: true,
			typeProduct: [],
			btnLoading: false,
			form: {
				sawmillrun_id: "",
				structure_category: "",
				type_id: "",
				size: "",
				height: "",
				width: "",
				length: "",
				id: "",
				pcs:"",
				nop: "",
				series: "",
			},
			Editform: {
				name: "",
				id: 0,
				pcs: 0,
				tally: "",
				height: 0.0,
				length: 0.0,
				width: 0.0,
				type_id: 0,
				type: "",
				structure_category: "",
				warehouse_id: 0,
			},
			theErrors: [],
			isBusy: false,
			process: [],
			extendable: [],
			kolom: [
				{ key: "series", label: "Series", sortable: true },
				{ key: "nop", label: "PCS (log)", sortable: true },
				{ key: "structure_category", label: "Category", sortable: true },
				{ key: "status", label: "Status", sortable: true },
				"action",
			],
			ExtenColumn: [
				{ key: "name", label: "Name", sortable: true },
				{ key: "tally", label: "tally ", sortable: true },
				{ key: "height", label: "height (m)", sortable: true },
				{ key: "width", label: "width (m)", sortable: true },
				{ key: "length", label: "length (m)", sortable: true },
				{ key: "pcs", label: "pcs", sortable: true },
				{ key: "size", label: "volume (m3)", sortable: true },
				
				{ key: "status", label: "status", sortable: true },
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
		this.getTypeProduct();
	},

	methods: {
		async ProcessTo() {
			this.btnLoading = true;

			try {
				let response = await axios.patch(
					`/api/stock/move1/${this.Editform.id}`,
					this.Editform
				);
				if (response.status == 200) {
					(this.Editform.id = ""),
						(this.Editform.length = ""),
						(this.Editform.width = ""),
						(this.Editform.height = ""),
						(this.Editform.structure_category = ""),
						(this.Editform.type_id = ""),
						(this.Editform.type = ""),
						(this.theErrors = []);
					this.btnLoading = false;
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
					$("#MoveProcessModal").modal("hide");
				}
			} catch (e) {
				this.btnLoading = false;
				console.log(e.response.data.errors);
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		setEditForm(value) {
			this.Editform.tally = value.tally;
			this.Editform.name = value.name;
			this.Editform.id = value.id;
			this.Editform.pcs = value.pcs;
			this.Editform.height = value.height;
			this.Editform.length = value.length;
			this.Editform.width = value.width;
			this.Editform.type_id = value.type_id;
		},
		async EditStock() {
			this.btnLoading = true;
			try {
				let response = await axios.patch(
					`/api/stock/index/${this.Editform.id}/update`,
					this.Editform
				);
				if (response.status == 200) {
					(this.Editform.id = ""),
						(this.Editform.length = ""),
						(this.Editform.width = ""),
						(this.Editform.height = ""),
						(this.Editform.structure_category = ""),
						(this.Editform.type_id = ""),
						(this.Editform.type = ""),
						(this.theErrors = []);
					this.btnLoading = false;
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
					$("#EditFormModal").modal("hide");
				}
			} catch (e) {
				this.btnLoading = false;
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		async getTypeProduct() {
			let response = await axios.get("/api/type/index");
			if (response.status === 200) {
				this.typeProduct = response.data.data;
			} else {
				this.$toast.error("Can't request TYPE PRODUCT", "Oops", {
					position: "topRight",
				});
			}
		},
		CreateModal(value) {
			this.form.sawmillrun_id = value.id;
			this.form.structure_category = value.structure_category;
			this.form.id = value.id;
			this.form.nop = value.nop;
			this.form.series = value.series;
		},

		async addstock() {
			this.btnLoading = true;

			try {
				let response = await axios.post("/api/stock/addstock", this.form);
				if (response.status == 200) {
					this.form = {};
					this.theErrors = [];
					this.btnLoading = false;
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
					$("#StockFormModal").modal("hide");
				}
			} catch (e) {
				this.btnLoading = false;
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		finish(value) {
			this.form.id = value.id;
			this.form.nop = value.nop;
			this.form.series = value.series;

			Vue.swal({
				title: "Are you sure to finish this process",
				html: `Finish the  <b>${value.series}</b> series.`,
				icon: "question",
				confirmButtonText: `Confirm`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.finishAction();
				}
			});
		},
		async finishAction() {
			try {
				let response = await axios.patch(
					`/api/gudang-sawmill/finish-process/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.form.id = "";
					this.form.nop = "";
					this.form.series = "";
					this.refreshTable();
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
					console.log(response);
				}
			} catch (e) {
				console.log(e.response);
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		cek(value) {
			this.Editform.structure_category = value.structure_category;
			value._showDetails = !value._showDetails;
		},
		rollback(value) {
			this.form = value;
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
			this.totalRows = filteredItems.length;
			this.currentPage = 1;
		},
		async toggleBusy() {
			this.isBusy = !this.isBusy;
			let { data } = await axios.get("/api/gudang-sawmill/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
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