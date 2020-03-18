<template>
    <div class="container">
        <div class="chat ltr-styl">
            <div class="row m-0">
                <div class="col-md-3 m-0 p-0">
                    <div class="aside_chat pb-3">
                        <div class="section-top-aside">
                            <div class="row">
                                <div class="col-2 ">
                                    <div class="img_user_profile position-relative pl-1 pr-1 ml-0">
                                        <img v-bind:src="user.main_image" v-bind:alt="user.main_name">
                                        <i class="fas fa-circle circle-on"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="search_chat">
                                        <fieldset class="form-group p-0 m-0 position-relative">
                                            <input type="text" class="form-control  search_contacts"
                                                   id="search_contacts" name="search_contacts" placeholder="بحث">
                                            <span class="icon-position"><i class="fas fa-search"></i></span>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chats_menu ">
                            <div class="menu-header">
                                <span>المحادثات</span>
                            </div>
                            <div class="hover-user" v-for="(onlineUser,index) in onlineUsers" :key="index">
                                <div class="users-tab" @click="changeReceiver(onlineUser.id)">
                                    <div class="row">
                                        <div class="img_user_profile pl-1 pr-1 col-2 ">
                                            <img v-bind:src="onlineUser.main_image" v-bind:alt="onlineUser.main_name">
                                        </div>
                                        <div class="col-9">
                                            <div class="">
                                                <span class=" name-User">{{onlineUser.main_name}}</span>
<!--                                                <span class="float-right time-msg">3:13 PM</span>-->
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="">
<!--                                                <span class="msg-text"> تالااااببييييي...</span>-->
<!--                                                <div class="float-right num-msg">-->
<!--                                                    <span>3</span>-->
<!--                                                </div>-->
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-header">
                                <span>المحداثات القديمه</span>
                            </div>
                            <div class="hover-user" v-for="userToChat  in usersToChat" >
                                <div class="users-tab" @click="changeReceiver(userToChat.id)">
                                    <div class="row">
                                        <div class="img_user_profile pl-1 col-2 ">
                                            <img v-bind:src="userToChat.main_image" v-bind:alt="userToChat.main_name">
                                        </div>
                                        <div class="col-9">
                                            <div class="">
                                                <span class=" name-User">{{userToChat.main_name}}</span>
                                                <!--                                                <span class="float-right time-msg">3:13 PM</span>-->
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="">
                                                <!--                                                <span class="msg-text"> تالااااببييييي...</span>-->
                                                <!--                                                <div class="float-right num-msg">-->
                                                <!--                                                    <span>3</span>-->
                                                <!--                                                </div>-->
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
                    <div class="content_chat" v-chat-scroll style=" overflow-y: auto">
                        <div class="head_content_msg" v-if="this.receiver">
                            <div class="img_user_profile position-relative ">
                                <img v-bind:src="receiverImage" v-bind:alt="receiverName">
<!--                                <i class="fas fa-circle circle-on" v-bind:class="[(receiverActive) ? ' text-success' : 'text-danger']" ></i>-->
                            </div>
                            <div class="d-inline">
                                <span class="font-weight-bold pl-3">{{receiverName}}</span>
                            </div>
                        </div>

                        <div v-for="(message , index) in messages" :key="index">
                            <div class="sender" v-if="senderID == message.receiver_id" >
                                <div class="img_user_profile pr-3">
                                    <img v-bind:src=" message.user.main_image" v-bind:alt="message.user.main_name">
                                </div>
                                <div class="body-sender">
                                    <p class="msg-sender d-inline"> {{message.message }}</p>
                                </div>
                            </div>
                            <div class=" recipient" v-else>
                                <p class="d-inline body-recipient"> {{message.message }}</p>
                                <div class="clearfix"></div>
                                <div class="img_user_profile pl-2">
                                    <img v-bind:src=" message.user.main_image" v-bind:alt="message.user.main_name">
                                </div>
                                <div class="mb-5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white pb-4">
                        <div class="row">
                            <div class="col-10">
                                <div class="send-styl position-relative">
                                    <label class="pt-2" for="send_msg"></label>
                                    <fieldset class="form-group p-0 m-0 ">
                                        <input type="text" v-model="newMessage" @keydown="sendTypingEvent"
                                               @keyup.enter="sendMessage" class="form-control send_msg" id="send_msg"
                                               name="message" placeholder="اكتب رسالتك">
                                    </fieldset>
                                    <span class="file-position">
                                        <label for="upload-photo"><i class="fas fa-folder-open fa-2x"></i></label>
                                        <input type="file" name="message" id="upload-photo" style="display:none">
                                    </span>
                                </div>
                            </div>
                            <div class="col-2 pt-4">
                                <button class="btn bg-color text-white pl-4 pr-4 font-weight-bold">Send</button>
                            </div>
                            <div class="col-12">
<!--                                <span class="text-muted" v-if="activeUser">{{activeUser.main_name}} is Typing....</span>-->
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
    import VueChatScroll from 'vue-chat-scroll'

    Vue.use(VueChatScroll);
    export default {
        props: ['user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                activeUser: false,
                typingTimer: false,
                onlineUsers: [],
                usersToChat: [],
                senderID: this.user.id,
                receiverID: '',
                receiver: false,
                receiverName: '',
                receiverImage: '',
                receiverActive: false,
            }
        },
        created() {
            this.fetchOldChats();
            let uri = window.location.search.substring(1);
            let params = new URLSearchParams(uri);
            if (params.get("salonId")){
                this.fetchReceiver(params.get("salonId"));
            }

            Echo.join('chat').here(user => {
                this.onlineUsers = user;
            }).joining(user => {
                this.onlineUsers.push(user);
            }).leaving(user => {
                this.onlineUsers = this.onlineUsers.filter(u => u.id != user.id)
            }).listen('ChatMessages', (event) => {
                if(event.message.sender_id == this.receiverID && event.message.receiver_id == this.senderID){
                    this.messages.push(event.message);
                }
            }).listenForWhisper('typing', user => {
               if (user.id == this.receiverID){
                   this.activeUser = user;
                   if (this.typingTimer) {
                       clearTimeout(this.typingTimer);
                   }
                   this.typingTimer = setTimeout(() => {
                       this.activeUser = false
                   }, 3000)
               }
            })
        },

        methods: {
            fetchReceiverInfo() {
                axios.get('messageReceiverData',{
                    params: {receiverID:  this.receiverID}})
                    .then(response => {
                        this.receiver = true;
                        this.receiverName = response.data.data.main_name;
                        this.receiverImage = response.data.data.main_image;
                    });
                },

            fetchOldChats() {
                axios.get('getOldChats/'+this.user.id,)
                    .then(response => {
                        console.log(response.data);
                        this.usersToChat = response.data;
                    });
            },
            fetchReceiver($id) {
                    this.receiverID = $id;
                    axios.get('messageReceiverData',{
                        params: {receiverID:  this.receiverID}})
                        .then(response => {
                            this.receiver = true;
                            this.receiverName = response.data.data.main_name;
                            this.receiverImage = response.data.data.main_image;
                        });
                    this.fetchMessages();

            },

            fetchMessages() {
            this.fetchReceiverInfo();
                axios.get('messages',{
                    params: {
                        receiverID:  this.receiverID
                    }
                }).then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                this.messages.push({
                    senderID: this.user.id,
                    receiverID: this.receiverID,
                    user: this.user,
                    message: this.newMessage
                });
                axios.post('messages', {message: this.newMessage,receiverID:this.receiverID});
                this.newMessage = '';
            },

            changeReceiver(id) {
                this.receiverID = id;
                this.fetchMessages();
            },
            sendTypingEvent() {
                // Echo.join('chat').whisper('typing', this.user);
            }
        }
    }
</script>
