export default class Gate{

    constructor(user){
        this.user = user;
    }


    isAdmin(){
        return this.user.usertype === 'Admin';
    }

    isAgent(){
        return this.user.usertype === 'Agent';
    }

    isCustomer(){
        return this.user.usertype === 'Customer';
    }
    
    isAdminOrAgent(){
        if(this.user.usertype === 'Admin' || this.user.usertype === 'Agent'){
            return true;
        }
    }



}