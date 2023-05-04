import { useAuth } from "../../store/AuthStore";


export function RoleGuard(to,from,next){
    if(to.meta.requiredRole === null){
        next();
    }
    else{
        if(to.meta.requiredRole.includes(useAuth().currentUserDetails.role?.role_name)){
            next();
        }
        
    }
}




