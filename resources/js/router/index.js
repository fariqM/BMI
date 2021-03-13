import Home from '../views/Home'
import About from '../views/About'
import Tes from '../views/Tes'
import AddFruit from '../views/AddFruit'
import UpdateFruit from '../views/UpdateFruit'
import Tabel from '../views/Tabel'
import Dashboard from '../views/Dashboard'
import BahanBaku from '../views/BahanBaku/Index'
import ShowLog from '../views/BahanBaku/ShowRaw'
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

import InputBasah from '../views/Basah/InputBasah'
import OutputBasah from '../views/Basah/OutputBasah'
import IndexBasah from '../views/Basah/IndexBasah'

import InputKering from '../views/Kering/InputKering'
import OutputKering from '../views/Kering/OutputKering'
import IndexKering from '../views/Kering/IndexKering'

import InputCoating from '../views/Coating/InputCoating'
import OutputCoating from '../views/Coating/OutputCoating'
import IndexCoating from '../views/Coating/IndexCoating'

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
            path: '/bahan-baku/index/:RawId',
            name: 'bb.show',
            component: ShowLog
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
            path: '/p-basah/input-index',
            name: 'basah.input.index',
            component: InputBasah
        },

        {
            path: '/p-basah/master-index',
            name: 'basah.master.index',
            component: IndexBasah
        },

        {
            path: '/p-basah/output-index',
            name: 'basah.output.index',
            component: OutputBasah
        },

        {
            path: '/p-kering/input-index',
            name: 'kering.input.index',
            component: InputKering
        },

        {
            path: '/p-kering/master-index',
            name: 'kering.master.index',
            component: IndexKering
        },

        {
            path: '/p-kering/output-index',
            name: 'kering.output.index',
            component: OutputKering
        },

        {
            path: '/p-coating/input-index',
            name: 'coating.input.index',
            component: InputCoating
        },

        {
            path: '/p-coating/master-index',
            name: 'coating.master.index',
            component: IndexCoating
        },

        {
            path: '/p-coating/output-index',
            name: 'coating.output.index',
            component: OutputCoating
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