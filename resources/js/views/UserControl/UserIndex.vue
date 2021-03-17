<template>
	<div>
		<div
			class="modal fade"
			id="EditUserForm"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">
							Edit User for {{ form.name }}
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
						<form method="post" @submit.prevent="editUserAction">
							<div class="form-group row">
								<label for="width" class="col-sm-3 col-form-label"
									>PASSWORD</label
								>

								<div class="col-sm-9">
									<i class="fa fa-envelope icon"></i>
									<input
										placeholder="Admin password"
										v-model="form.password"
										type="password"
										class="form-control costum-form-password-hide"
										id="password"
									/>

									<div v-if="theErrors.password" class="mt-2 text-danger">
										{{ theErrors.password[0] }}
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="width" class="col-sm-3 col-form-label"
									>RE-TYPE</label
								>

								<div class="col-sm-9">
									<input
										placeholder="Retype password"
										v-model="form.retype"
										type="password"
										class="form-control"
										id="retype"
									/>

									<div v-if="theErrors.password" class="mt-2 text-danger">
										{{ theErrors.password[0] }}
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							@click="editUserAction"
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
				<li class="breadcrumb-item"><a href="#">User Controll</a></li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
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
									<label class="costum-checkbox" for="kolomID">Name</label>

									<input
										class="costum-checkbox"
										v-model="filterOn"
										value="name"
										id="kolomRef"
										type="checkbox"
									/>
									<label class="costum-checkbox" for="kolomRef">Role</label>
								</div>
							</div>
							<div class="grid-item-container-2 grid-item-2">
								<div class="justify-content-between">
									<b-button
										style="justify-content: end; justify-content: end"
										@click="$router.push({ name: 'create.admin' })"
										variant="primary"
									>
										<b-icon icon="plus-square" aria-hidden="true"></b-icon>
										New Admin
									</b-button>
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
									<a
										@click="DeleteUser(data.item)"
										class="badge badge-danger del-btn"
										>DELETE</a
									>
									<a
										data-toggle="modal"
										data-target="#EditUserForm"
										@click="UpdateUser(data.item)"
										class="badge badge-primary del-btn"
										>CHANGE PASSWORD</a
									>
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
			cond: 0,
			btnHandle: false,
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
				{ key: "email", label: "email", sortable: true },
				{ key: "mobile", label: "mobile", sortable: true },
				{ key: "address", label: "address", sortable: true },
				{ key: "permission", label: "role", sortable: true },
				{ key: "active", label: "active since", sortable: true },
				"action",
			],
			form: {
				id: "",
				name: "",
				email: "",
				password: "",
				retype: "",
				address: "",
				mobile: "",
				warehouse_id: "",
				role_id: "",
				role_name: "",
			},
			theErrors: [],
			permission_option: [],
			placement: "top",
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
		this.getPermission();
	},

	methods: {
		async editUserAction() {
			this.btnLoading = true;
			console.log(this.form);
			if (this.form.password != this.form.retype) {
				this.$toast.error("Password not equal", "Oops,", {
					position: "topRight",
				});
				this.btnLoading = false;
			} else {
				if (this.cond == 0) {
					this.cond = 1;
					try {
						let response = await axios.patch(
							`/api/dashboard/user-edit/${this.form.id}`,
							this.form
						);
						if (response.status == 200) {
							$("#EditUserForm").modal("hide");
							this.btnLoading = false;
							this.theErrors = [];
							this.$toast.success("Password has been changed", "Done!", {
								position: "topRight",
							});
							this.cond = 0;
						}
					} catch (e) {
						this.theErrors = e.response.data.errors;
						this.$toast.error("Something wrong!", "Oops,", {
							position: "topRight",
						});
						this.cond = 0;
						this.btnLoading = false;
					}
				}
			}
		},
		// DeleteUser(value) {
		// 	console.log("delete = " + value);
		// },
		UpdateUser(value) {
			// console.log(value);
			this.form.name = value.name;
			this.form.password = value.password;
			this.form.id = value.id;
		},
		DeleteUser(value) {
			console.log(value);
			this.form.id = value.id;
			this.form.permission = value.permission;
			Vue.swal({
				title: "Delete alert!",
				html: `Are you sure to delete <b>${value.name}</b> as <b>${value.permission}</b> ?`,
				icon: "question",
				confirmButtonText: `Confirm`,
				showCancelButton: true,
				timerProgressBar: true,
				showCloseButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					// console.log();
					this.DeleteUserAction();
				}
			});
		},
		async DeleteUserAction() {
			try {
				let response = await axios.delete(
					`/api/dashboard/user-controller/destroy/${this.form.id}`,
					this.form
				);
				if (response.status == 200) {
					this.$toast.success("An admin has been deleted", "Done!", {
						position: "topRight",
					});
					this.refreshTable()
				}
			} catch (e) {
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something wrong!", "Oops,", {
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
			let { data } = await axios.get("/api/dashboard/user-controller");
			this.stocks = [];
			this.stocks = data.data;
			this.totalRows = this.stocks.length;
			setTimeout((this.isBusy = !this.isBusy), 6000);
		},
		async refreshTable() {
			let { data } = await axios.get("/api/dashboard/user-controller");
			this.stocks = [];
			this.stocks = data.data;
			this.totalRows = this.stocks.length;
		},
		setPermission(value) {
			this.form.permission = value.title;
			this.form.permission_id = value.id;
		},
		async getPermission() {
			let { data } = await axios.get("/api/dashboard/index-permission");
			this.permission_option = data.data;
		},
	},
};
</script>

<style>
</style>