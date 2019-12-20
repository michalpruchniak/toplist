import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import './top.css';

export default class Toplist extends Component {
    constructor(props){
        super(props);
        axios.defaults.baseURL = "http://localhost:8000";
        this.state = {elements: [] };
    }
    componentDidMount(){
        this.getToplist();
        this.TimerID = setInterval(
            () => this.getToplist(),
            800
          );
    }

    getToplist(){
        const id = this.props.id;


        axios.get(`ajax/top/` + id)
        .then(res => {
          const elements = res.data;
          this.setState({ elements });
          console.log(this.state.elements);

        })
    }



    render() {

        return (
            <div className="container">
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
