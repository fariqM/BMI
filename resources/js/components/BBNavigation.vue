<template>
	<nav class="sidebar">
		<div class="sidebar-header">
			<div>
				<a href="#" class="sidebar-brand">SIBMI <span>Web</span> </a>
				<!-- <h9>Sistem_Informasi Inventory</h9> -->
			</div>

			<div class="sidebar-toggler not-active">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="sidebar-body">
			<ul class="nav metismenu" id="menu1">
	
				<li class="nav-item nav-category">Main</li>
				<li class="nav-item active">
					<router-link :to="{ name: 'dashboard' }" class="nav-link">
						<i class="link-icon" data-feather="box"></i>
						<span class="link-title">Dashboard Gudang Bahan-Baku</span>
					</router-link>
				</li>

				<li class="nav-item nav-category">Inventory</li>

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="mail"></i>
						<span class="link-title">Gudang Bahan Baku</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'bb.index' }"
								class="nav-link costum-nav-link"
								>Master / Index
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'bb.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>



			</ul>
		</div>
	</nav>
</template>

<script>
export default {};
</script>

<style>
</style>