import React from 'react';
import ReactDOM from 'react-dom';
import axios from "axios"

export default class Category extends React.Component {
    constructor() {
        super();
        this.state = {
            categories: [],
        }
    }

    componentDidMount() {
        axios.get('/view_category')
            .then((res)=>{this.setState(...res.data);console.log(this.state)})
            .catch((err)=>{console.log(err)})
    }

    render() {
        return <div className="add-new-data-sidebar">
            <div className="overlay-bg"></div>
            <div className="add-new-data">
                <div className="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 className="text-uppercase">Edit Category</h4>
                    </div>
                    <div className="hide-data-sidebar">
                        <i className="feather icon-x"></i>
                    </div>
                </div>
                <div className="card-content">
                    <div className="card-body">
                        <form className="form" action="route('edit_category')" method="POST">
                            <div className="form-body">
                                <div className="row">
                                    <div className="col-md-12 col-12">
                                        <div className="form-label-group">
                                            <input type="hidden" id="category-column-id" name="id"/>
                                            <input type="text" id="category-column" className="form-control"
                                                   placeholder="Enter Category Name" name="name"/>
                                        </div>
                                    </div>

                                    <div className="col-12">
                                        <button type="submit" className="btn btn-primary mr-1 mb-1">Update
                                            Category
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div className="add-data-footer d-flex justify-content-around px-3 mt-2">
                </div>
            </div>
            <div className="card-body">
                <div className="table-responsive">
                    <table className="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {this.state.categories.map((item) => {
                            return <tr>
                                <td>{item.name}</td>
                                <td>
                                    <span className="" onClick="openEdit($num)">
                                        <i className="feather icon-edit"></i>
                                    </span>
                                    <a href="url('view_category/delete_category/'.$num->id)">
                                        <span id="delete-item-" className="action-delete">
                                            <i className="feather icon-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        })}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    }
}
if (document.getElementById('category-component')) {
    ReactDOM.render(<Category/>, document.getElementById('category-component'))
}

