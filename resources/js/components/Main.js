import React, { Component } from 'react';
import ReactDOM from 'react-dom';
 
/* Main Component */
class Main extends Component {
 
  constructor() {
   
    super();
    //Initialize the state in the constructor
    this.state = {
        companies: [],
    }
  }
  /*componentDidMount() is a lifecycle method
   * that gets called after the component is rendered
   */
  componentDidMount() {
    /* fetch API in action */
    fetch('/api/companies')
        .then(response => {
            return response.json();
        })
        .then(companies => {
            //Fetched company is stored in the state
            this.setState({ companies });
        });
  }
 
 rendercompanies() {
    return this.state.companies.map(company => {
        return (
            /* When using list you need to specify a key
             * attribute that is unique for each list item
            */
            <li key={company.id} >
                { company.title } 
            </li>      
        );
    })
  }
   
  render() {
   /* Some css code has been removed for brevity */
    return (
        <div>
              <ul>
                { this.rendercompanies() }
              </ul> 
              <p>THIS SHOULD DO SOMETHING?</p>
            </div> 
       
    );
  }
}