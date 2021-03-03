<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Penambahan data invoice</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-9">
						<input
							maxlength="15"
							type="text"
							v-model="form.name"
							class="form-control costum-validation-input"
							id="name"
							placeholder="Email"
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
							:to="{ name: 'pages.tes' }"
							>Kembali</router-link
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
				let response = await axios.post("/api/fruits/add-fruit", this.form);
				if (response.status == 200) {
					this.form.name = "";
					this.form.varian = "";
					this.form.latin_name = "";
					this.form.origin = "";
					this.form.year_found = "";
					this.theErrors = [];
					this.$toast.success("Mantap", "Berhasil Horee!", {
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
