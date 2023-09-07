import { createRouter, createWebHistory } from 'vue-router';

import Add from "../crud/AddNew.vue" ;
import Table from "../crud/list.vue" ;
import Edit from "../crud/editData.vue" ;


const routes =  [
    { path: '/add-new', name: 'Add', component: Add },
    { path: '/', name: 'Table', component: Table },
    { path: '/student/edit/:id', name: 'student.edit', component: Edit },
  ];

const router = createRouter({
    history: createWebHistory(),
    routes,
  })

  export default router;
