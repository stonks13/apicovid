#!/bin/bash


for i in `cat dades.csv `
do
#casos
fecha=`echo $i | cut -d';' -f1`
numero=`echo $i | cut -d';' -f3`
#muertos
muertos=`echo $i | cut -d';' -f7`

ia7=`echo $i | cut -d';' -f6`

ia14=`echo $i | cut -d';' -f5`


echo "INSERT INTO ia14 (fecha, ccaa_id,media) VALUES ('$fecha',1,$ia14 );"
echo "INSERT INTO ia7 (fecha, ccaa_id,media) VALUES ('$fecha',1,$ia7 );"
echo "INSERT INTO muertos (fecha,ccaa_id,numero)VALUES ('$fecha',1,$muertos );"
echo "INSERT INTO casos (fecha,ccaa_id,numero)VALUES ('$fecha',1,$numero );"


done
