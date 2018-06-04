#include <pthread.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/types.h>

int contador = 1;

void *codigo_hilo(void *_id){
	int i;
	int id = *(int *)_id;
	for(i=1;i<=10;i++){
		printf("Hilo %d  contador: %d  i:%d\n",id,contador,i);
		contador++;
	}
	pthread_exit(&id);
}

int main(){
  int h;
  pthread_t hilo[5];
  pthread_t th;
	int id[5]={1,2,3,4,5};
  int error;
  int *salida;
	int i;

	for(i=0;i<5;i++){
		
		error = pthread_create(&hilo[i],NULL,codigo_hilo,&id[i]);
		
		if(error){
		  fprintf(stderr,"Error %d: %s\n",error, strerror(error));
		  exit(-1);
		}
	}

	for(i=0;i<5;i++){
    error = pthread_join(hilo[i],(void **)&salida);
    if(error)
      fprintf(stderr,"Error %d: %s\n",error,strerror(error));
    else
      printf("Hilo %d terminado\n",*salida);
	}
	
	
	
	
	
	
	
	
	return 0;
}
