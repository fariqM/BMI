import Home from '../views/Home'
import About from '../views/About'
import Tes from '../views/Tes'
import AddFruit from '../views/AddFruit'
import UpdateFruit from '../views/UpdateFruit'
import Tabel from '../views/Tabel'
import Dashboard from '../views/Dashboard'
import EditLog from '../views/BahanBaku/EditLog'
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

import UserControll from '../views/UserControl/UserIndex'
import AddUserForm from '../views/UserControl/AddUser'
// import Error404 from '../views/Error/404'

export default{
    mode: 'history',


    routes: [

        {
            path: '/bmi/user-control',
            name: 'user.control',
            component: UserControll
        },

        {
            path: '/bmi/create-admin',
            name: 'create.admin',
            component: AddUserForm
        },

        {
            path: '/bmi/home',
            name: 'home',
            component: Home
        },
        
        {
            path: '/bmi/about',
            name: 'pages.about',
            component: About
        },
        {
            path: '/bmi/tes',
            name: 'pages.tes',
            component: Tes
        },
        {
            path: '/bmi/addfruit',
            name: 'fruit',
            component: AddFruit
        },

        {
            path: '/bmi/fruits/:FruitId',
            name: 'edit.fruit',
            component: UpdateFruit
        },

        {
            path: '/bmi/tabel',
            name: 'tabel',
            component: Tabel
        },

        {
            path: '/bmi/dashboard',
            name: 'dashboard',
            component: Dashboard
        },

        {
            path: '/bmi/bahan-baku/index',
            name: 'bb.index',
            component: BahanBaku
        },

        {
            path: '/bmi/bahan-baku/index/edit/:RawId',
            name: 'bb.index.edit',
            component: EditLog
        },

        {
            path: '/bmi/bahan-baku/index/:RawId',
            name: 'bb.show',
            component: ShowLog
        },

        {
            path: '/bmi/bahan-baku/output-index',
            name: 'bb.output.index',
            component: OutputBB
        },

        {
            path: '/bmi/sawmill/index',
            name: 'sawmil.index',
            component: Sawmill
        },

        {
            path: '/bmi/sawmill/input-index',
            name: 'sawmil.input.index',
            component: inputSawmill
        },

        {
            path: '/bmi/sawmill/output-index',
            name: 'sawmil.output.index',
            component: OutputSawmill
        },
        
        {
            path: '/bmi/sawmill/raw-manufacturing',
            name: 'sawmil.raw.manufacturing',
            component: RawManufacturing
        },

        {
            path: '/bmi/p-basah/input-index',
            name: 'basah.input.index',
            component: InputBasah
        },

        {
            path: '/bmi/p-basah/master-index',
            name: 'basah.master.index',
            component: IndexBasah
        },

        {
            path: '/bmi/p-basah/output-index',
            name: 'basah.output.index',
            component: OutputBasah
        },

        {
            path: '/bmi/p-kering/input-index',
            name: 'kering.input.index',
            component: InputKering
        },

        {
            path: '/bmi/p-kering/master-index',
            name: 'kering.master.index',
            component: IndexKering
        },

        {
            path: '/bmi/p-kering/output-index',
            name: 'kering.output.index',
            component: OutputKering
        },

        {
            path: '/bmi/p-coating/input-index',
            name: 'coating.input.index',
            component: InputCoating
        },

        {
            path: '/bmi/p-coating/master-index',
            name: 'coating.master.index',
            component: IndexCoating
        },

        {
            path: '/bmi/p-coating/output-index',
            name: 'coating.output.index',
            component: OutputCoating
        },

        {
            path: '/bmi/p-joint/input-index',
            name: 'joint.input.index',
            component: InputJoint
        },

        {
            path: '/bmi/p-joint/master-index',
            name: 'joint.master.index',
            component: IndexJoint
        },

        {
            path: '/bmi/p-joint/output-index',
            name: 'joint.output.index',
            component: OutputJoint
        },

        {
            path: '/bmi/p-packing/input-index',
            name: 'packing.input.index',
            component: InputPacking
        },

        {
            path: '/bmi/p-packing/master-index',
            name: 'packing.master.index',
            component: IndexPacking
        },

        {
            path: '/bmi/p-packing/output-index',
            name: 'packing.output.index',
            component: OutputPacking
        },




        
        {
            path: '/bmi/bahan-baku/form',
            name: 'bb.form',
            component: FormBB
        },

        {
            path: '/bmi/invoice/form',
            name: 'inv.form',
            component: FormInvoice
        },

        {
            path: '/bmi/structure/form',
            name: 'str.form',
            component: FormStructure
        },

        {
            path: '/bmi/warehouse/form',
            name: 'wrh.form',
            component: FormWarehouse
        },

        {
            path: '/bmi/supplier/form',
            name: 'spl.form',
            component: FormSupplier
        },


    ]
}