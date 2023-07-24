@extends('admin.layouts.master')
@section('header')
<x-header title="Dashboard"></x-header>
@endsection
@section('content')
   

       
            <div  class=" col-lg-3 col-6">

                <div class="small-box card">
                    <div class="inner">
                        <h3></h3>
                        <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box card">
                    <div class="inner">
                        <h3></h3>
                        <p>Consulting</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box card">
                    <div class="inner">
                     <h3></h3>
                        <p>Assurance</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box card">
                    <div class="inner">
                     <h3></h3>

                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    {{-- <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>

        

    {{-- <div class="col-md-7"> --}}
    {{-- <h5 class="pb-3">Aktifitas Harian</h5> --}}
    {{-- @foreach (range(1, 8) as $item)
            <div class="card">
                <div class="card-header">
                    Irban I - Siska Octora
                </div>
                <div class="card-body">
                    <span class="p-2 badge badge-primary">
                        <i class="fa fa-calendar-plus"></i>
                        <span class="pl-1"> Rabu, 03-November-2022</span>
                    </span>
                    <p class="pt-3 info_kegiatan">
                        Menghadiri Rapat Persiapan pemeriksaan khusus di aula BKPSDMD kota jambi
                    </p>
                    <button class="float-right btn btn-primary">Lihat Aktifitas</button>
                </div>
            </div>
        @endforeach --}}
    {{-- </div> --}}
    {{-- <div class="col-lg-5">
        <div style=" position: fixed; z-index: 1030;" class="pr-3">
            <h5 class="pb-3">Tim Kerja</h5>
            <div class="row">
                @foreach (range(1, 8) as $index => $itemc)
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">

                                @switch($index)
                                    @case(0)
                                        Irban I
                                    @break

                                    @case(1)
                                        Irban II
                                    @break

                                    @case(2)
                                        Irban III
                                    @break

                                    @case(3)
                                        Irban IV
                                    @break

                                    @case(4)
                                        Irban Khusus
                                    @break

                                    @case(5)
                                        Kasubbag. Perencanaan
                                    @break

                                    @case(6)
                                        Kasubbag. Analis dan Evaluas
                                    @break

                                    @case(7)
                                        Kasubbag. Administrasi Umum
                                        dan Keuangan
                                    @break

                                    @default
                                @endswitch


                            </div>
                            <div class="card-body p-1 pt-2">
                                <div class="container">
                                    <div style="text-align: left" class="row">
                                        <div class="col-12">
                                            <div class="user-panel pb-2 d-flex">
                                                <div class="image">
                                                    <img width="25px" src="{{ asset('img/avatar2.png') }}"
                                                        class="img-circle elevation-2" alt="User Image">
                                                </div>
                                                <div class="info">
                                                    <a href="#" class="d-block">Lian Mafutra</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="user-panel pb-2 d-flex">
                                                <div class="image">
                                                    <img width="25px" src="{{ asset('img/avatar2.png') }}"
                                                        class="img-circle elevation-2" alt="User Image">
                                                </div>
                                                <div class="info">
                                                    <a href="#" class="d-block">Abdullah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
