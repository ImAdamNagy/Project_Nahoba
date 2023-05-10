import { useAuth } from "../../store/AuthStore.js";


export async function RoleGuard(to,from,next){
    if(to.meta.requiredRole === undefined){
        next();
    }
    else{
        if(to.meta.requiredRole.includes((await useAuth().userDetails()).data.data.role?.role_name)){
            next();
        }
        else{
            next({name:'ForbiddenView'});
        }
    }
}




