<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Create Log Data</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="width" class="col-sm-3 col-form-label">NAME</label>

					<div class="col-sm-9">
						<input
							placeholder="Admin Name"
							v-model="form.name"
							type="text"
							class="form-control"
							id="name"
						/>

						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">ROLE NAME </label>
					<div class="col-sm-9">
						<v-select
							class="style-chooser"
							@input="setPermission"
							:options="permission_option"
							label="title"
						>
						</v-select>
						<div v-if="theErrors.permission" class="mt-2 text-danger">
							{{ theErrors.permission[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="width" class="col-sm-3 col-form-label">EMAIL</label>

					<div class="col-sm-9">
						<input
							placeholder="Admin Email for login"
							v-model="form.email"
							type="email"
							class="form-control"
							id="email"
						/>

						<div v-if="theErrors.email" class="mt-2 text-danger">
							{{ theErrors.email[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="width" class="col-sm-3 col-form-label">PASSWORD</label>

					<div class="col-sm-9">
						<i class="fa fa-envelope icon"></i>
						<input
							placeholder="Admin password for login"
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
						>RE-TYPE PASSWORD</label
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

				<div class="form-group row">
					<label for="width" class="col-sm-3 col-form-label">ADDRESS</label>

					<div class="col-sm-9">
						<input
							placeholder="Admin address"
							v-model="form.address"
							type="address"
							class="form-control"
							id="address"
						/>

						<div v-if="theErrors.address" class="mt-2 text-danger">
							{{ theErrors.address[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">PHONE</label>
					<div class="col-sm-9">
						<masked-input
							:mask="[
								'(',
								/[0-9]/,
								/\d/,
								/\d/,
								')',
								' ',
								/\d/,
								/\d/,
								/\d/,
								'-',
								/\d/,
								/\d/,
								/\d/,
								/\d/,
							]"
							v-model="form.mobile"
							:guide="false"
							type="text"
							class="form-control"
							id="phone"
						/>
						<div v-if="theErrors.phone" class="mt-2 text-danger">
							{{ theErrors.phone[0] }}
						</div>
					</div>
				</div>

				<div class="my-grid">
					<div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
					</div>
					<div>
						<router-link
							class="btn btn-outline-secondary"
							:to="{ name: 'bb.index' }"
							>Back</router-link
						>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
import { createPopper } from "@popperjs/core";
export default {
	data() {
		return {
			eyeUnactive: true,
			eyeActive: false,
			form: {
				name: "",
				email: "",
				password: "",
				retype: "",
				address: "",
				mobile: "",
				permission: "",
				permission_id: "",
				role: "",
			},
			theErrors: [],
			permission_option: [],
			placement: "top",
		};
	},

	mounted() {
		this.getPermission();
	},

	methods: {
		withPopper(dropdownList, component, { width }) {
			/**
			 * We need to explicitly define the dropdown width since
			 * it is usually inherited from the parent with CSS.
			 */
			dropdownList.style.width = width;

			/**
			 * Here we position the dropdownList relative to the $refs.toggle Element.
			 *
			 * The 'offset' modifier aligns the dropdown so that the $refs.toggle and
			 * the dropdownList overlap by 1 pixel.
			 *
			 * The 'toggleClass' modifier adds a 'drop-up' class to the Vue Select
			 * wrapper so that we can set some styles for when the dropdown is placed
			 * above.
			 */
			const popper = createPopper(component.$refs.toggle, dropdownList, {
				placement: this.placement,
				modifiers: [
					{
						name: "offset",
						options: {
							offset: [0, -1],
						},
					},
					{
						name: "toggleClass",
						enabled: true,
						phase: "write",
						fn({ state }) {
							component.$el.classList.toggle(
								"drop-up",
								state.placement === "top"
							);
						},
					},
				],
			});
			return () => popper.destroy();
		},

		setSupplier(value) {
			this.form.supplier_id = value.id;
		},
		async getSupplier() {
			let { data } = await axios.get("/api/supplier/index");
			this.supplier_option = data.data;
		},
		async getStructure() {
			let { data } = await axios.get("/api/structure-category/index");
			this.category_option = data.data;
		},
		async store() {
			
			console.log(this.form);
			if (this.form.password != this.form.retype) {
				this.$toast.error("Password not equal", "Oops,", {
					position: "topRight",
				});
			} else {
				
				try {
					
					let response = await axios.post(
						"/api/dashboard/add-user",
						this.form
					);
					if (response.status == 200) {
						this.$router.push({ name: "user.control" });
						this.$toast.success("New admin has been created", "Done!", {
							position: "topRight",
						});
						//  console.log(response);
					}
				} catch (e) {
					this.theErrors = e.response.data.errors;
					this.$toast.error("Something wrong!", "Oops,", {
						position: "topRight",
					});
				}
			}
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
.my-grid {
	display: grid;
	grid-template-columns: 1fr auto;
}

.costum-footer-dropdown {
	margin: 5px 5px 0px 5px;
	display: grid;
	grid-template-columns: 1fr;
	justify-items: center;
	align-items: center;
}

.v-select.drop-up.vs--open .vs__dropdown-toggle {
	border-radius: 0 0 4px 4px;
	border-top-color: transparent;
	border-bottom-color: rgba(60, 60, 60, 0.26);
}

[data-popper-placement="top"] {
	border-radius: 4px 4px 0 0;
	border-top-style: solid;
	border-bottom-style: none;
	box-shadow: 0 -3px 6px rgba(0, 0, 0, 0.15);
}
</style>
