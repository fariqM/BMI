<template>
	<div>
		<!-- Modal for Edit Form id=EditFormModal func=EditStock -->
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
									class="form-control"
									placeholder="PCS"
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

		<!-- Edit Profile Wood Modal id=EditProfileWood func=EditProfileWood -->
		<div
			class="modal fade"
			id="EditProfileWood"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Edit stock profile {{ form.name }} - {{ form.tally }}
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
						<form method="patch" @submit.prevent="EditProfileWood">
							<div class="form-group">
								<label for="nop" class="col-form-label">Height (cm)</label>
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

								<label for="nop" class="col-form-label">width (cm)</label>
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

								<label for="nop" class="col-form-label">length (cm)</label>
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
									placeholder="PCS"
								/>
								<div v-if="theErrors.pcs" class="mt-2 text-danger">
									{{ theErrors.pcs[0] }}
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="EditProfileWood"
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
				<li class="breadcrumb-item"><a href="#">Gudang Packing</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Process Index
				</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Process Control In <b>Gudang Packing</b></h6>
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
									<template
										v-if="data.item.status == 'stored at GUDANG PACKING'"
									>
										<span class="badge badge-pill badge-success">
											<b-icon
												class="costum-badge"
												icon="box-arrow-in-down-left"
											></b-icon>
											QUEUE ON PACKING
										</span>
									</template>
									<template v-if="data.item.status == 'packing process'">
										<span class="badge badge-pill badge-success">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>

									<template v-if="data.item.status == 'finished on BMI-G'">
										<span class="badge badge-pill badge-success">
											<b-icon
												class="costum-badge"
												icon="check2-square"
											></b-icon>
											PACKING FINISHED
										</span>
									</template>
								</template>

								<template #cell(action)="info">
									<div class="grid-action-column">
										<a @click="cek(info.item)" class="badge badge-info del-btn"
											><b-icon icon="search"></b-icon>
										</a>
										<a
											@click="setEditStockForm(info.item)"
											data-toggle="modal"
											data-target="#EditFormModal"
											class="badge badge-primary del-btn"
										>
											EDIT
										</a>
										<template
											v-if="
												info.item.confirm_status == 'confirmed' &&
												info.item.status != 'packing process' &&
												info.item.status != 'finished on BMI-G'
											"
										>
											<a
												@click="proceed(info.item)"
												class="badge badge-primary del-btn"
											>
												PROCEED
											</a>
										</template>

										<template v-if="info.item.status == 'packing process'">
											<a
												@click="finishPacking(info.item)"
												class="badge badge-success del-btn"
												>FINISH</a
											>
											<a
												@click="rollback(info.item)"
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
												<template #cell(action)="data">
													<a
														data-toggle="modal"
														data-target="#EditProfileWood"
														@click="setEditForm(data.item)"
														class="badge badge-primary del-btn"
														>EDIT PROFILE WOOD</a
													>
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
				pcs: 0,
				length: 0,
				id: "",
				nop: "",
				series: "",
			},
			Editform: {
				name: "",
				id: 0,
				tally: "",
				height: 0.0,
				length: 0.0,
				pcs: 0,
				width: 0.0,
				type_id: 0,
				type: "",
				structure_category: "",
				warehouse_id: 0,
			},
			theErrors: [],
			isBusy: false,
			extendable: [],
			process: [],
			kolom: [
				{ key: "name", label: "Name", sortable: true },
				{ key: "tally", label: "tally", sortable: true },
				{ key: "pcs", label: "pcs", sortable: true },
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
				{ key: "pcs", label: "pcs", sortable: true },
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
		async EditProfileWood() {
			this.btnLoading = true;
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-packing/edit-profile-stock-packing/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.theErrors = [];
					$("#EditProfileWood").modal("hide");
					this.btnLoading = false;
					this.$toast.success("Edit success", "Done!", {
						position: "topRight",
					});
					// console.log(response);
				}
			} catch (e) {
				this.btnLoading = false;
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		async EditStock() {
			this.btnLoading = true;
			try {
				let response = await axios.patch(
					`/api/gudang-packing/edit-stock-packing/${this.Editform.id}`,
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

		proceed(value) {
			this.form.id = value.id;
			this.form.tally = value.tally;
			this.form.name = value.name;
			Vue.swal({
				title: `Proceed alert`,
				html: `Are you sure to process the <b>${this.form.name}</b> - <b>${this.form.tally}</b> ?`,
				icon: "question",
				confirmButtonText: `Confirm`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.proceedAction();
				}
			});
		},

		async proceedAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-packing/proceed/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.form.id = "";
					this.form.tally = "";
					this.form.name = "";
					this.refreshTable();
					this.$toast.success("Proceed action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				this.$toast.error("Something wrong", "Oops!", {
					position: "topRight",
				});
				console.log(e);
			}
		},
		cancelPacking(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			Vue.swal({
				title: `Attention!`,
				html: `are you sure want to cancel packing process the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to moulding process?`,
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
		finishPacking(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			this.form.tally = value.tally;
			Vue.swal({
				title: "Finish Alert",
				html: `are you sure want to finish packing process of the <b>${this.form.name}</b> - <b>${this.form.tally}</b> ?`,
				icon: "question",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.finishPackingAction();
				}
			});
		},
		async finishPackingAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-packing/finish-packing/${this.form.id}`,
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
			// console.log(value);
			this.form.length = value.length;
			this.form.width = value.width;
			this.form.height = value.height;
			this.form.id = value.id;
			this.form.pcs = value.pcs;
		},

		setEditStockForm(value) {
			this.Editform.name = value.name;
			this.Editform.tally = value.tally;
			this.Editform.length = value.length;
			this.Editform.width = value.width;
			this.Editform.height = value.height;
			this.Editform.id = value.id;
			this.Editform.pcs = value.pcs;
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
					`/api/gudang-packing/rollback/${this.form.id}`,
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
			let { data } = await axios.get("/api/gudang-packing/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async refreshTable() {
			let { data } = await axios.get("/api/gudang-packing/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
		},
	},
};
</script>