export function AuthGuard(to,from,next){
    if(!to.meta.requiresAuth){
        next();
    }
    else{
        if(localStorage.getItem('token') === null){
            next({name: 'LoginPage'});
        }
        else{
            next();
        }
    }
}