import EditData from './components/EditData.vue';
import Pilotage from './components/Pilotage.vue';

export const routes = [
    {
        name: 'editData',
        path: '/edit',
        component: EditData
    },
    {
        name: 'showPilotage',
        path: '/',
        component: Pilotage
    }
];
