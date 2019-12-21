import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import './style.css';


export default class Vote extends Component {
    constructor(props){
        super(props);
        axios.defaults.baseURL = "http://localhost:8000";
        this.state = {elements: [] };
        this.vote = this.vote.bind(this);
    }
    componentDidMount(){
        this.getElements();
    }
    vote(id){
        const vote = {
            element_id: id
        }

        axios.post(`ajax/vote`, { vote })
      .then(res => {
        console.log(res);
        console.log(res.data);
      })
        this.getElements();
    }
    getElements(){
        const id = this.props.id;


        axios.get(`ajax/displayelements/` + id)
        .then(res => {
          const elements = res.data;
          this.setState({ elements });
        })
        console.log(this.state.elements);
    }
    countVotes(){
        const id = this.props.id;


        axios.get(`ajax/displayelements/` + id)
        .then(res => {
          const elements = res.data;
          this.setState({ elements });
        })
        console.log(this.state.elements);
    }



    render() {

        return (
            <div className="container">

                {this.state.elements && this.state.elements.length !== 2 ? (
                    <h2>Brak elementów do wyświetlenia</h2>
                ) : (
                    <ul className="toplistElements">
                        { this.state.elements.map(element => <li key={element.id}>
                            <div onClick={() => this.vote(element.id)} className="singleElement"  style ={ { backgroundImage: "url("+element.photo+")" } }>
                            </div>
                        </li>)}
                    </ul>
                )}
            </div>

        );
    }
}


if (document.getElementById('vote')) {

    const component = document.getElementById('vote');
    const props = Object.assign({}, component.dataset);

    ReactDOM.render(<Vote {...props} />, component);
}
