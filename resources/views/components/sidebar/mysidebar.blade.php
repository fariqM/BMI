<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand"> BMI <span>Web</span> </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="sidebar-body">
        <ul class="nav metismenu" id="menu1">
            <li class="nav-item nav-category">Contoh Menu</li>
            <li class="nav-item" style="">
                <a class="nav-link has-arrow" aria-expanded="false">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                </a>
                <ul class="costum-submenu">
                    <li class="nav-item costum-nav-item">
                        <router-link :to="{name:'home'}" class="nav-link costum-nav-link">menu </router-link>
                    </li>
                    <li class="nav-item costum-nav-item costum-nav-item-active">
                        <router-link :to="{name:'pages.about'}" class="nav-link costum-nav-link">Read</router-link>
                    </li>
                    <li class="nav-item costum-nav-item">
                        <router-link :to="{name:'pages.tes'}" class="nav-link costum-nav-link">Compose</router-link>
                    </li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>