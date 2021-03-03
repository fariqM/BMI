<template>
	<div class="card">
		<div class="card-body">
			<h6 class="card-title">Create warehouse data</h6>
			<form method="post" class="forms-sample" @submit.prevent="store">
				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label"
						>WAREHOUSE NAME</label
					>
					<div class="col-sm-9">
						<input
							type="text"
							v-model="form.name"
							class="form-control"
							id="structur"
							placeholder="Warehouse name"
						/>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label">SHORTNAME</label>
					<div class="col-sm-9">
                        
						<masked-input
							:mask="[/[a-zA-Z]/,/[a-zA-Z]/,/[a-zA-Z]/,'-', /[a-zA-Z]/,/[a-zA-Z]/]"
                            :guide="false"
							type="text"
							v-model="form.shortname"
							class="form-control"
							id="structur"
							placeholder="Structure category name"
						/>
						<div v-if="theErrors.name" class="mt-2 text-danger">
							{{ theErrors.name[0] }}
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-3 col-form-label"
						>ADDRESS</label
					>
					<div class="col-sm-9">
						<textarea
							v-model="form.address"
							class="form-control"
							id="address"
							rows="5"
							placeholder="Warehouse address"
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
							>Kembali</router-link
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
				shortname: "BMI",
                capacity:0,
                address:"",
			},
			theErrors: [],
			
		};
	},

	methods: {
        
		async store() {
			try {
				let response = await axios.post(
					"/api/warehouse/add-warehouse",
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
				this.$toast.error("Something Wrong!", "Oops,", {
					position: "topRight",
				});
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
