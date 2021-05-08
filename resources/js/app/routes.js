import auth from './auth/routes';
import restaurant from './restaurants/routes';
import home from './home/routes';
import timeline from './timeline/routes';
import errors from './errors/routes/index.js';

export default [...home,...auth,...restaurant,...timeline,...errors]
