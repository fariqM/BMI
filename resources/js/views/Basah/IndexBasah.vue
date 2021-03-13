<template>
	<div>
		<!-- Edit Profile Wood Modal -->
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

		<!-- Create Profile WOod Modal -->
		<div
			class="modal fade"
			id="CreateProfile"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Create stock profile
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
						<form method="patch" @submit.prevent="CreateProfile">
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
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="CreateProfile"
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

		<!-- Process to Modal  -->
		<div
			class="modal fade"
			id="NextProcessModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Process to</h5>
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
									v-model="form.warehouse_id"
									name="TypeProduct"
									id="typeProduct"
								>
									<option value="13">COATING</option>
									<option value="14">PACKING</option>
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
				<li class="breadcrumb-item"><a href="#">Gudang Pembahanan Basah</a></li>
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
							Process Control In <b>Gudang Pembahanan Basah</b>
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
									<template v-if="data.item.status == 'profile process'">
										<span class="badge badge-pill badge-success">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>

									<template v-if="data.item.status == 'moulding process'">
										<span class="badge badge-pill badge-success">
											<b-icon class="costum-badge" icon="clock"></b-icon>
											{{ data.item.status.toUpperCase() }}
										</span>
									</template>

									<template v-if="data.item.status == 'finished on BMI-D'">
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
										<template> </template>

										<template v-if="info.item.status == 'finished on BMI-D'">
											<a
												@click="cek(info.item)"
												class="badge badge-info del-btn"
												><b-icon icon="search"></b-icon>
											</a>

											<template v-if="info.item.name.includes('JOINT')">
												<a
													@click="JointStage(info.item)"
													class="badge badge-secondary del-btn"
												>
													JOINT STAGE
												</a>
											</template>

											<template v-if="!info.item.name.includes('JOINT')">
												<template v-if="!info.item.name.includes('MD')">
													<a
														@click="moulding(info.item)"
														class="badge badge-secondary del-btn"
														>MOULDING
													</a>
												</template>
												<a
													data-toggle="modal"
													data-target="#NextProcessModal"
													@click="nextProcess(info.item)"
													class="badge badge-secondary del-btn"
												>
													PROCESS TO
												</a>
											</template>
										</template>

										<template v-if="info.item.status == 'profile process'">
											<a
												@click="finish(info.item)"
												data-toggle="modal"
												data-target="#CreateProfile"
												class="badge badge-success del-btn"
												>FINISH</a
											>
											<a
												@click="rollback(info.item)"
												class="badge badge-warning del-btn"
											>
												ROLLBACK
											</a>
										</template>

										<template v-if="info.item.status == 'moulding process'">
											<a
												@click="finishMoulding(info.item)"
												class="badge badge-success del-btn"
												>FINISH</a
											>
											<a
												@click="cancelMoulding(info.item)"
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
														>EDIT</a
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
		cancelMoulding(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			Vue.swal({
				title: `Are you sure to cancel this process`,
				html: `are you sure want to cancel moulding process the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to moulding process?`,
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
					`/api/gudang-p-basah/cancel-moulding-basah/${this.form.id}`,
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
		finishMoulding(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			this.form.tally = value.tally;
			Vue.swal({
				title: "Finish Alert",
				html: `are you sure want to finish moulding process of the <b>${this.form.name}</b> - <b>${this.form.tally}</b> ?`,
				icon: "question",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.finishMouldingAction();
				}
			});
		},
		async finishMouldingAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/finish-moulding-basah/${this.form.id}`,
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
		nextProcess(value) {
			// this.form.id = value.id
			this.form.id = value.id;
		},
		async ProcessTo() {
			this.btnLoading = true;
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/basah-move-to/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					$("#NextProcessModal").modal("hide");
					this.refreshTable();
					this.btnLoading = false;
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				console.log(e);
				this.btnLoading = false;
				this.$toast.error("Something wrong", "Oops", {
					position: "topRight",
				});
			}
		},
		moulding(value) {
			this.form.id = value.id;
			this.form.name = value.name;
			this.form.tally = value.tally;
			Vue.swal({
				title: "Process to moulding ?",
				html: `are you sure want to process the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to moulding process?`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.mouldingAction();
				}
			});
		},
		async mouldingAction() {
			console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/proceed/moulding/${this.form.id}`,
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
		JointStage(value) {
			this.form.name = value.name;
			this.form.tally = value.tally;
			this.form.id = value.id;
			Vue.swal({
				title: "Next stage is JOINT stage",
				html: `are you sure want move the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to JOINT warehouse ?`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.JointStageAction();
				}
			});
		},
		async JointStageAction() {
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/move-to-joint/${this.form.id}`,
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
		CoatingStage(value) {
			this.form.name = value.name;
			this.form.tally = value.tally;
			this.form.length = value.length;
			this.form.width = value.width;
			this.form.height = value.height;
			this.form.id = value.id;
			this.form.warehouse_id = value.warehouse_id;

			Vue.swal({
				title: "Next stage is COATING stage",
				html: `are you sure want move the <b>${this.form.name}</b> - <b>${this.form.tally}</b> to COATING warehouse ?`,
				icon: "warning",
				confirmButtonText: `Yes`,
				cancelButtonText: "No",
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					this.CoatingStageAction();
				}
			});
		},
		async CoatingStageAction() {
			console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/move-to-coating/${this.form.id}`,
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
		async EditProfileWood() {
			this.btnLoading = true;
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/edit-profile-stock/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.theErrors = [];
					$("#EditProfileWood").modal("hide");
					this.btnLoading = false;
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
				}
			} catch (e) {
				this.btnLoading = false;
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong when updating data!", "Oops,", {
					position: "topRight",
				});
			}
		},
		cek(value) {
			value._showDetails = !value._showDetails;
		},
		async CreateProfile() {
			this.btnLoading = true;
			// console.log(this.form);
			try {
				let response = await axios.patch(
					`/api/gudang-p-basah/create-profile-stock/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.refreshTable();
					this.theErrors = [];
					$("#CreateProfile").modal("hide");
					this.btnLoading = false;
					this.$toast.success("Action success", "Done!", {
						position: "topRight",
					});
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
					`/api/gudang-p-basah/rollback/${this.form.id}`,
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
			let { data } = await axios.get("/api/gudang-p-basah/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async refreshTable() {
			let { data } = await axios.get("/api/gudang-p-basah/process-index");
			this.process = [];
			this.process = data.data;
			this.totalRows = this.process.length;
		},
	},
};
</script>