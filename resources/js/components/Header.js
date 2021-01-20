    // resources/js/components/Header.js

import React from 'react';
import { BrowserRouter as Router, Route, Link, NavLink } from 'react-router-dom';
import bootstrap from 'bootstrap/dist/css/bootstrap.css';  
import SampleList from './SampleList';
import SampleCreate from './SampleCreate';
import SampleEdit from './SampleEdit';
import Register from './Register';

    const Header = () => (
      <Router>  
    <div>  
       <nav className="navbar navbar-dark bg-primary   navbar-expand-lg  ">
   <Link exact to="/" className="navbar-brand" >React CRUD by UnitedWebSoft.in </Link>
  <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span className="navbar-toggler-icon"></span>
  </button>
  <div className="collapse navbar-collapse" id="navbarText">
    <ul className="navbar-nav mr-auto">
      <li className="nav-item active">
        <Link exact  to="/"  className="nav-link"  > Home  </Link>
      </li>
      <li className="nav-item">
        <Link to="/create" className="nav-link"  > Add </Link>
      </li>
        <li className="nav-item">
        <Link to="/register" className="nav-link"  > Register </Link>
      </li>
    </ul>
    
  </div>
</nav> 

      <Route exact path="/" component={SampleList} />  
	   <Route exact path="/register" component={Register} />  
      <Route  path="/create" component={SampleCreate} />  
    <Route  path="/sample/:id/edit" component={SampleEdit} />  

     </div>  
  </Router>  
    )

    export default Header