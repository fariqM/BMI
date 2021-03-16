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

import InputJoint from '../views/Joint/InputJoint'
import OutputJoint from '../views/Joint/OutputJoint'
import IndexJoint from '../views/Joint/IndexJoint'

import InputPacking from '../views/Packing/InputPacking'
import OutputPacking from '../views/Packing/OutputPacking'
import IndexPacking from '../views/Packing/IndexPacking'

// import Error404 from '../views/Error/404'

export default{
    mode: 'history',


    routes: [

        {
            path: '/web/home',
            name: 'home',
            component: Home
        },
        
        {
            path: '/web/about',
            name: 'pages.about',
            component: About
        },
        {
            path: '/web/tes',
            name: 'pages.tes',
            component: Tes
        },
        {
            path: '/web/addfruit',
            name: 'fruit',
            component: AddFruit
        },

        {
            path: '/web/fruits/:FruitId',
            name: 'edit.fruit',
            component: UpdateFruit
        },

        {
            path: '/web/tabel',
            name: 'tabel',
            component: Tabel
        },

        {
            path: '/web/dashboard',
            name: 'dashboard',
            component: Dashboard
        },

        {
            path: '/web/bahan-baku/index',
            name: 'bb.index',
            component: BahanBaku
        },

        {
            path: '/web/bahan-baku/index/:RawId',
            name: 'bb.show',
            component: ShowLog
        },

        {
            path: '/web/bahan-baku/output-index',
            name: 'bb.output.index',
            component: OutputBB
        },

        {
            path: '/web/sawmill/index',
            name: 'sawmil.index',
            component: Sawmill
        },

        {
            path: '/web/sawmill/input-index',
            name: 'sawmil.input.index',
            component: inputSawmill
        },

        {
            path: '/web/sawmill/output-index',
            name: 'sawmil.output.index',
            component: OutputSawmill
        },
        
        {
            path: '/web/sawmill/raw-manufacturing',
            name: 'sawmil.raw.manufacturing',
            component: RawManufacturing
        },

        {
            path: '/web/p-basah/input-index',
            name: 'basah.input.index',
            component: InputBasah
        },

        {
            path: '/web/p-basah/master-index',
            name: 'basah.master.index',
            component: IndexBasah
        },

        {
            path: '/web/p-basah/output-index',
            name: 'basah.output.index',
            component: OutputBasah
        },

        {
            path: '/web/p-kering/input-index',
            name: 'kering.input.index',
            component: InputKering
        },

        {
            path: '/web/p-kering/master-index',
            name: 'kering.master.index',
            component: IndexKering
        },

        {
            path: '/web/p-kering/output-index',
            name: 'kering.output.index',
            component: OutputKering
        },

        {
            path: '/web/p-coating/input-index',
            name: 'coating.input.index',
            component: InputCoating
        },

        {
            path: '/web/p-coating/master-index',
            name: 'coating.master.index',
            component: IndexCoating
        },

        {
            path: '/web/p-coating/output-index',
            name: 'coating.output.index',
            component: OutputCoating
        },

        {
            path: '/web/p-joint/input-index',
            name: 'joint.input.index',
            component: InputJoint
        },

        {
            path: '/web/p-joint/master-index',
            name: 'joint.master.index',
            component: IndexJoint
        },

        {
            path: '/web/p-joint/output-index',
            name: 'joint.output.index',
            component: OutputJoint
        },

        {
            path: '/web/p-packing/input-index',
            name: 'packing.input.index',
            component: InputPacking
        },

        {
            path: '/web/p-packing/master-index',
            name: 'packing.master.index',
            component: IndexPacking
        },

        {
            path: '/web/p-packing/output-index',
            name: 'packing.output.index',
            component: OutputPacking
        },




        
        {
            path: '/web/bahan-baku/form',
            name: 'bb.form',
            component: FormBB
        },

        {
            path: '/web/invoice/form',
            name: 'inv.form',
            component: FormInvoice
        },

        {
            path: '/web/structure/form',
            name: 'str.form',
            component: FormStructure
        },

        {
            path: '/web/warehouse/form',
            name: 'wrh.form',
            component: FormWarehouse
        },

        {
            path: '/web/supplier/form',
            name: 'spl.form',
            component: FormSupplier
        },


    ]
}