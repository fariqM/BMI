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
						<span class="link-title">Dashboard</span>
					</router-link>
				</li>

				<!-- <li class="nav-item nav-category">Contoh Menu</li>
				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="mail"></i>
						<span class="link-title">Email</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'home' }"
								class="nav-link costum-nav-link"
								>Home
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'pages.about' }"
								class="nav-link costum-nav-link"
								>About</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'pages.tes' }"
								class="nav-link costum-nav-link"
								>tes</router-link
							>
						</li>
					</ul>
				</li> -->

				<li class="nav-item nav-category">Inventory</li>

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
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

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang Sawmill</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'sawmil.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'sawmil.raw.manufacturing' }"
								class="nav-link costum-nav-link"
								>Raw Manufacturing</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'sawmil.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang P Basah</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'basah.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'basah.master.index' }"
								class="nav-link costum-nav-link"
								>Processing Index</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'basah.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang P Kering</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'kering.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'kering.master.index' }"
								class="nav-link costum-nav-link"
								>Processing Index</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'kering.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item" style="">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang Coating</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'coating.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'coating.master.index' }"
								class="nav-link costum-nav-link"
								>Processing Index</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'coating.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang Joint</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'joint.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'joint.master.index' }"
								class="nav-link costum-nav-link"
								>Processing Index</router-link
							>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'joint.output.index' }"
								class="nav-link costum-nav-link"
								>Output Record</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a class="nav-link has-arrow" aria-expanded="false">
						<i class="link-icon" data-feather="life-buoy"></i>
						<span class="link-title">Gudang Packing</span>
					</a>
					<ul class="costum-submenu">
						<li class="nav-item costum-nav-item">
							<router-link
								:to="{ name: 'packing.input.index' }"
								class="nav-link costum-nav-link"
								>Input Record
							</router-link>
						</li>
						<li class="nav-item costum-nav-item costum-nav-item-active">
							<router-link
								:to="{ name: 'packing.master.index' }"
								class="nav-link costum-nav-link"
								>Processing Index</router-link
							>
						</li>
					</ul>
				</li>

				<li class="nav-item nav-category">User Controll</li>
				<li class="nav-item">
					<router-link :to="{ name: 'user.control' }" class="nav-link">
						<i class="link-icon" data-feather="box"></i>
						<span class="link-title">User Management</span>
					</router-link>
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