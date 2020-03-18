
@extends('site.layout.index')
@section('content')
    <main class="">
        <div class="container">
            <div class="chat">
                <div class="row m-0">
                    <div class="col-md-3 m-0 p-0">
                        <div class="aside_chat pb-3">
                            <div class="section-top-aside">
                                <div class="row">
                                    <div class="col-2 ">
                                        <div class="img_user_profile position-relative pl-1 ml-0">
                                            <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            <i class="fas fa-circle circle-on"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="search_chat">
                                            @include('site.components.inputs.search',[
                                                'name'=>'search_contacts',
                                                'id'=>'search',
                                                'class'=>'search_contacts',
                                                'type'=>'search',
                                                'label'=>'search',
                                                'icon'=>'fas fa-search',
                                                'placeholder'=>trans('web.searchOrstart'),
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chats_menu">
                                <div class="menu-header">
                                    <span>{{trans('web.chats')}}</span>
                                </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="float-right num-msg">
                                                        <span >3</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-header pt-4 pb-4">
                                    <span>{{ trans('web.contacts') }} </span>
                                </div>
                                  <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ml-2">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="hover-user">
                                    <div class="users-tab">
                                        <div class="row">
                                            <div class="img_user_profile pl-1 col-2 ">
                                                <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                            </div>
                                            <div class="col-9">
                                                <div class="">
                                                    <span class=" name-User">محمد جلال</span>
                                                    <span class="float-right time-msg">3:13 PM</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="">
                                                    <span class="msg-text"> تالااااببييييي...</span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 m-0 p-0 ">
                        <div class="content_chat"  >
                            <div class="head_content_msg">
                                <div class="img_user_profile position-relative ">
                                    <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                    <i class="fas fa-circle circle-on text-danger"></i>
                                </div>
                                <div class="d-inline">
                                    <span class="font-weight-bold pl-3">محمد جلال</span>
                                    <a href="" class="text-dark">
                                         <i class="far fa-star float-right p-3"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="sender">
                                 <div class="img_user_profile pr-3">
                                    <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                </div>
                                <div class="body-sender" >
                                    <p class="msg-sender d-inline"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident beatae architecto labore perferendis. Iste quis iure libero officia? Ullam ipsa fugit ex! Fugiat eius placeat est aspernatur provident labore blanditiis?</p>
                                </div>
                            </div>
                             <div class="col-12"></div>
                             <div class="recipient">
                                <p class="d-inline body-recipient"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem praesentium eius ipsum nam voluptatum aperiam nisi dolor autem quae velit, consequatur laborum. Laudantium suscipit hic magni porro sapiente ducimus cupiditate.</p>
                                <div class="clearfix"></div>
                                <div class="img_user_profile pl-2">
                                    <img src="{{url('design/site/images/avatar.png')}}" alt="">
                                </div>
                                <div class="mb-5"></div>
                            </div>
                        </div>
                        <div class="bg-white pb-4">
                            <div class="row">
                                <div class="col-10">
                                    <div class="pl-3">
                                        @include('site.components.inputs.text',[
                                            'name'=>'send_msg',
                                            'id'=>'send_msg',
                                            'class'=>'send_msg',
                                            'type'=>'text',
                                            'label'=>'',
                                            'icon'=>'',
                                            'placeholder'=>trans('web.writeYourMessage'),
                                        ])
                                    </div>
                                </div>
                                <div class="col-2 pt-4">
                                    <button class="btn bg-color text-white pl-4 pr-4 font-weight-bold">{{ trans('web.send') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </main>
@stop
