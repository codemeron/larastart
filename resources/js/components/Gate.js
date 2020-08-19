export default class Gate{
    constructor(user){
        this.user = user;
    }

    isSystemAdministrator(){
        return this.user.type === 'System Administrator';
    }
    isSchoolAdministrator(){
        return this.user.type === 'School Administrator';
    }
    isProgramHead(){
        return this.user.type === 'Program Head';
    }
    isAdviser(){
        return this.user.type === 'Adviser';
    }



}