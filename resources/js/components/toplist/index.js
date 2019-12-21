import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Countvotes from './countvotes';
import './top.css';

export default class Toplist extends Component {
    constructor(props){
        super(props);
        axios.defaults.baseURL = "http://localhost:8000";
        this.state = {elements: [], count: 0 };
    }
    componentDidMount(){
        this.getToplist();
        this.countVotes();

    }

    getToplist(){
        const id = this.props.id;


        axios.get(`ajax/top/` + id)
        .then(res => {
          const elements = res.data;
          this.setState({ elements });
        //   console.log(this.state.elements);

        })
    }
    countVotes(){
        const id = this.props.id;


        axios.get(`ajax/count-votes/` + id)
        .then(res => {
          this.setState({ count: res.data });

        })
    }



    render() {

        return (
            <div className="container">
                    <Countvotes count={ this.state.count } />
                    <ul className="top">
                        { this.state.elements.map((element, index) => <li key={element.id}>
                            <div  className="singleElement"  style ={ { backgroundImage: "url("+element.photo+")" } }>
                                <span className="index"># {index+1}</span>
                            </div>
                        </li>)}
                    </ul>

            </div>

        );
    }
}


if (document.getElementById('toplist')) {

    const component = document.getElementById('toplist');
    const props = Object.assign({}, component.dataset);

    ReactDOM.render(<Toplist {...props} />, component);
}
