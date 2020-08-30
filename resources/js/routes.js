import Tab1 from './components/Tab1';
import Tab2 from './components/Tab2';

export default {
    /* mode: 'history', */

    routes: [
        {
            path: '/tab1',
            component: Tab1
        },
        {
            path: '/tab2',
            component: Tab2
        },
    ]
};