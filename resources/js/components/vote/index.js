import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Loading from './components/Loading';
import Voteelements from './components/Voteelements';
import './style.css';


export default class Vote extends Component {
    constructor(props){
        super(props);
        axios.defaults.baseURL = "http://localhost:8000";
        this.state = {elements: [], loading: true, error: false, countElements: 0 };
    }
    componentDidMount(){
        this.getElements();
    }
    getElements(){
        const id = this.props.id;


        axios.get(`ajax/countelements/` + id)
        .then(res => {
          this.setState({ countElements: res.data, loading: false });
          console.log(this.state.countElements);
        }).catch(error => {
            this.setState({ error });
        })
        console.log(this.state.elements);
    }

    render() {
        if(this.state.countElements < 3 && this.state.loading == false) {
            return <div className="container text-center">Toplist require 3 elements or more to display.</div>
        } else if(this.state.error !== false) {
            return <div className="container text-center">Toplist require 3 elements or more to display.</div>

        } else {
            return <div className="container"><Voteelements id={this.props.id} /></div>
        }


        }
    }



if (document.getElementById('vote')) {

    const component = document.getElementById('vote');
    const props = Object.assign({}, component.dataset);

    ReactDOM.render(<Vote {...props} />, component);
}
