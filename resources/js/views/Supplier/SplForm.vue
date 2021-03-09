<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Create supplier data</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">AGENCY</label>
					<div class="col-sm-9">
						<input
							v-model="form.name"
							type="text"
							class="form-control"
							id="agency"
						/>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">ADDRESS</label>
					<div class="col-sm-9">
						<input
							v-model="form.address"
							type="text"
							class="form-control"
							id="address"
						/>
						<div v-if="theErrors.address" class="mt-2 text-danger">
							{{ theErrors.address[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">OWNER</label>
					<div class="col-sm-9">
						<input
							v-model="form.owner"
							type="text"
							class="form-control"
							id="owner"
						/>
						<div v-if="theErrors.owner" class="mt-2 text-danger">
							{{ theErrors.owner[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">EMAIL</label>
					<div class="col-sm-9">
						<input
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
					<label for="name" class="col-sm-3 col-form-label">WEBSITE</label>
					<div class="col-sm-9">
						<input
							v-model="form.website"
							type="url"
							class="form-control"
							id="website"
						/>
						<div v-if="theErrors.website" class="mt-2 text-danger">
							{{ theErrors.website[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">PHONE</label>
					<div class="col-sm-9">
						<masked-input
						:mask="['(', /[0-9]/, /\d/, /\d/, ')', ' ', /\d/, /\d/, /\d/, '-', /\d/, /\d/, /\d/, /\d/]"
							v-model="form.phone"
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

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">MOBILE</label>
					<div class="col-sm-9">
						<masked-input
							:mask="[ /\d/, /\d/,/\d/,/\d/,'-',/\d/, /\d/,/\d/,/\d/,'-',/\d/, /\d/,/\d/,/\d/,/\d/]"
							v-model="form.mobile"
							type="text"
							:guide="false"
							class="form-control"
							id="mobile"
						/>
						<div v-if="theErrors.mobile" class="mt-2 text-danger">
							{{ theErrors.mobile[0] }}
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
							:to="{ name: 'bb.form' }"
							>Back</router-link
						>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			form: {
				name: "",
				address: "",
				owner: "",
				email: "",
				website: "",
				phone: "",
				mobile: "",
			},
			theErrors: [],
			inv_options: [],
		};
	},

	mounted() {
		this.getSupplier();
	},

	methods: {
		async store() {
			// console.log(this.form);
			try {
				let response = await axios.post(
					"/api/supplier/add-supplier",
					this.form
				);
				if (response.status == 200) {
					this.form.name = "";
					this.form.address = "";
					this.form.owner = "";
					this.form.website = "";
					this.form.phone = "";
					this.form.mobile = "";
					this.theErrors = [];
					this.$router.push({ name: "inv.form" });
					this.$toast.success("1 record has been saved!", "Done, ", {
						position: "topRight",
					});
					//  console.log(response.status);
				}
			} catch (e) {
				this.theErrors = e.response.data.errors;
				this.$toast.error("Ada yang error!", "Oops,", { position: "topRight" });
			}
		},
	},
};
</script>

<style>
.my-grid {
	display: grid;
	grid-template-columns: 1fr auto;
}
</style>
