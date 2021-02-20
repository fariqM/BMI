import Home from '../views/Home'
import About from '../views/About'
import Tes from '../views/Tes'
import AddFruit from '../views/AddFruit'
import UpdateFruit from '../views/UpdateFruit'

export default{
    mode: 'history',

    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        
        {
            path: '/about',
            name: 'pages.about',
            component: About
        },
        {
            path: '/tes',
            name: 'pages.tes',
            component: Tes
        },
        {
            path: '/addfruit',
            name: 'fruit',
            component: AddFruit
        },

        {
            path: '/updatefruit',
            name: 'update.fruit',
            component: UpdateFruit
        },
    ]
}