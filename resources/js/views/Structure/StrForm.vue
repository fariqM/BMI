<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Create structure category</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label"
						>STRUCTURE CATEGORY</label
					>
					<div class="col-sm-9">
						<input
							maxlength="15"
							type="text"
							v-model="form.name"
							class="form-control costum-validation-input"
							id="structur"
							placeholder="Structure category name"
						/>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
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
// import "../../../public/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js";
// import "../../../public/assets/js/bootstrap-maxlength.js";

export default {
	data() {
		return {
			form: {
				name: "",
			},
			theErrors: [],
		};
	},

	methods: {
		async store() {
			try {
				let response = await axios.post(
					"/api/structure-category/add-structure",
					this.form
				);
				if (response.status == 200) {
					this.form.name = "";
					this.theErrors = [];
					this.$router.push({ name: "bb.form" });
					this.$toast.success("1 record has been saved!", "Done, ", {
						position: "topRight",
					});
					//  console.log(response.status);
				}
			} catch (e) {
				this.theErrors = e.response.data.errors;
				this.$toast.error("Something Wrong!", "Oops,", { position: "topRight" });
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
