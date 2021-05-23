import auth from './auth/routes';
import restaurant from './restaurants/routes';
import home from './home/routes';
import timeline from './timeline/routes';
import cart from './cart/routes/index.js';
import order from './order/routes/index.js';
import errors from './errors/routes/index.js';

export default [...home, ...auth, ...restaurant, ...cart, ...timeline, ...order,...errors]
