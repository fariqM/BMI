import Home from '../views/Home'
import About from '../views/About'
import Tes from '../views/Tes'
import AddFruit from '../views/AddFruit'
import UpdateFruit from '../views/UpdateFruit'
import Tabel from '../views/Tabel'
import Dashboard from '../views/Dashboard'
import BahanBaku from '../views/BahanBaku/Index'
import OutputBB from '../views/BahanBaku/Output'
import FormBB from '../views/BahanBaku/Input'
import FormInvoice from '../views/Invoice/FormInv'
import FormStructure from '../views/Structure/StrForm'
import FormWarehouse from '../views/Warehouse/WrhForm'
import FormSupplier from '../views/Supplier/SplForm'
import Sawmill from '../views/Sawmill/Index'
import OutputSawmill from '../views/Sawmill/OutputSawmill'
import inputSawmill from '../views/Sawmill/InputSawmill'
import RawManufacturing from '../views/Sawmill/RawManufacturing'



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
            path: '/fruits/:FruitId',
            name: 'edit.fruit',
            component: UpdateFruit
        },

        {
            path: '/tabel',
            name: 'tabel',
            component: Tabel
        },

        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },

        {
            path: '/bahan-baku/index',
            name: 'bb.index',
            component: BahanBaku
        },

        {
            path: '/bahan-baku/output-index',
            name: 'bb.output.index',
            component: OutputBB
        },

        {
            path: '/sawmill/index',
            name: 'sawmil.index',
            component: Sawmill
        },

        {
            path: '/sawmill/input-index',
            name: 'sawmil.input.index',
            component: inputSawmill
        },

        {
            path: '/sawmill/output-index',
            name: 'sawmil.output.index',
            component: OutputSawmill
        },
        
        {
            path: '/sawmill/raw-manufacturing',
            name: 'sawmil.raw.manufacturing',
            component: RawManufacturing
        },

        
        {
            path: '/bahan-baku/form',
            name: 'bb.form',
            component: FormBB
        },

        {
            path: '/invoice/form',
            name: 'inv.form',
            component: FormInvoice
        },

        {
            path: '/structure/form',
            name: 'str.form',
            component: FormStructure
        },

        {
            path: '/warehouse/form',
            name: 'wrh.form',
            component: FormWarehouse
        },

        {
            path: '/supplier/form',
            name: 'spl.form',
            component: FormSupplier
        },


    ]
}