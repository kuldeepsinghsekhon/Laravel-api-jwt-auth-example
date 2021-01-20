    // resources/js/components/App.js


    import React, { Component } from 'react'
    import ReactDOM from 'react-dom'
    import { BrowserRouter, Route, Switch } from 'react-router-dom'
    import axios from 'axios'
    import Header from './Header'
    import SampleList from './SampleList'
    import SampleCreate from './SampleCreate'
    import SampleEdit from './SampleEdit'

  
    axios.defaults.baseURL='http://aquatecinnovative.co.in/api';


    class App extends Component {
      render () {
        return (
          <BrowserRouter>
            <div>
              <Header />
              
            </div>
          </BrowserRouter>
        )
      }
    }

    ReactDOM.render(<App />, document.getElementById('app'))