import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'


    class Register extends Component {
		 render () {
        return (
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="">
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus></input>

                               
                            </div>
                        </div>


                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
     )
      }
    }

    export default Register