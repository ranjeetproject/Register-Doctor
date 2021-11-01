@extends('frontend.beforeloginlayout.app')

@section('content')

<section class="for-w-100 main-content innerpage  top-doctor-page">
    <div class="container">
        <h1 class="inner-page-title">Top Doctor</h1>
        <ul class="top-doctor-warning-info">
            <li>We asked doctors which specialist they would recommend to friends or family</li>
            <li>The list is not limited to great internet doctors - included also are those with good face-to-face & surgical skills</li>
            <li>We also consider popularity & availability including Region & City finding you the best specialists <i data-toggle="tooltip" title="Tooltip on top" class="fas fa-info-circle"></i></li>
        </ul>
        <div class="td-search-control-bx">
            <div class="td-select-control">
                <label>Filter :</label>
                <div class="select">
                    <select class="form-control">
                        <option>Location</option>
                        <option>London</option>
                        <option>India</option>
                    </select>
                </div>
                <div class="select">
                    <select class="form-control">
                        <option>Speciality</option>
                        <option>ENT</option>
                        <option>surgeon</option>
                    </select>
                </div>
                <label>Sort By :</label>
                <div class="select">
                    <select class="form-control">
                        <option>Most recent</option>
                        <option>Most popular</option>
                    </select>
                </div>
            </div>
            <div class="td-search-right-bx">
                <input type="search" placeholder="Search.." class="form-control"/>
            </div>
        </div>
        <div class="table-responsive td-table-bx">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Location</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Practice</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                <tr>
                    <td>Jhon Doe</td>
                    <td>ENT</td>
                    <td>London</td>
                    <td>Very nice surgeon</td>
                    <td>London</td>
                    <td>jhondoe@gmail.com</td>
                    <td>1234567894</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>




@endsection
