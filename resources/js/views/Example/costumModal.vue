<template>
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

								<div class="costum-size-profile-wood">
									<label>
										<b>Profile size</b>
									</label>
									<div class="costum-size-profile-wood-item2">
										<div>
											<label for="nop" class="costum-label-modal" >length (cm)</label>
											<input
												type="number"
												step="0.001"
												class="form-control form-control-sm"
											/>
										</div>
										<div>
											<label for="nop" class="costum-label-modal" >width (cm)</label>
											<input
												type="number"
												step="0.001"
												class="form-control form-control-sm"
											/>
										</div>
										<div>
											<label for="nop" class="costum-label-modal" >height (cm)</label>
											<input
												type="number"
												step="0.001"
												class="form-control form-control-sm"
											/>
										</div>
									</div>
								</div>

								<div v-if="theErrors.length" class="mt-2 text-danger">
									{{ theErrors.length[0] }}
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
</template>

<script>
export default {

}
</script>

<style>

</style>