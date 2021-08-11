<div id="updateSoftware" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-center">Actualizaciones Realizadas a la Plataforma</h3>
            </div>
            <div class="modal-body text-center">
                <table class="table-responsive" border="2" style="border-collapse:separate; border-spacing: 1px 1px;">

                    <tr style="background-color: #eee26e">
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Módulo</th>
                    </tr>
                    <tbody class="text-center">
                    <tr>
                        <td>11 de Agosto del 2021</td>
                        <td>Se realiza el mantenimiento semestral a la base de datos en el que se realiza
                            una busqueda de errores, se revisan los índices de las tablas de la base de datos
                            y se eliminan los registros obsoletos e innecesarios para evitar cargas altas
                            en la base de datos y que sean optimos y rapidos los procesos realizados en ella.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Base de Datos</span>
                        </td>
                    </tr>
                    <tr>
                        <td>04 de Agosto del 2021</td>
                        <td>Se detecta un problema con Chrome tras su ultima actualziacion que causaba que
                            las librerias de VueJs no se ejecutaran correctamente y afectaba el funcionamiento
                            de la plataforma.
                            <br><br>
                            Se realiza la respectiva corrección de la ejecucion de las librerias de VueJs para
                            que no se vean afectadas tras la ultima actualización de Chrome.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>03 de Agosto del 2021</td>
                        <td>Se realiza una mejora a la generación de los reportes de la ejecución presupuestal.
                            Anteriormente el usuario seleccionaba los meses de los que deseaba obtener la
                            ejecución presupuestal. Ahora el usuario tiene la posibilidad de obtener el
                            informe dando el rango de fechas de los que el desee obtener la ejecución.
                            <br><br>
                            De esta forma el usuario tiene la posibilidad de seleccionar el rango de ejecución
                            que requiere.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Presupuesto</span><br><br>
                            <span class="badge badge-pill badge-danger">Reportes</span>
                        </td>
                    </tr>
                    <tr>
                        <td>27 de Julio del 2021</td>
                        <td>Se realiza el ajuste cuando se excede el tiempo de la sesión del usuario. Cuando se
                            excedia ese tiempo se redireccionaba el usuario a una interfaz de acceso con un diseño
                            no acorde a la plataforma, se realiza el ajuste para que sea el usuario redireccionado
                            a la interfaz principal de la plataforma.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Inicio de Sesión</span><br><br>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>23 de Julio del 2021</td>
                        <td>Se agrega al menú de configuración la opcion para desplegar el listado de los
                            cambios que han realizado a la plataforma. En este listado saldran todas las
                            actualizaciones que se han realizado a la plataforma incluyendo el modulo afectado.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>21 de Julio del 2021</td>
                        <td>Se realiza la implementación de la conexión de las firmas de los PDFs de las órdenes de pago
                            y comprobantes de egresos con el módulo de configuración general. Al realizar esta conexión
                            saldrá la firma de la persona correspondiente dependiendo la fecha de vigencia que tenga asignada.
                            De esta forma al registrar cambios en los funcionarios debido al cambio de la vigencia se
                            actualizarán automáticamente las firmas con la persona correspondiente en el módulo de
                            configuración general.
                            <br><br>
                            En el caso de que no hay una persona asignada en la vigencia actual saldrá el nombre de
                            “POR DEFINIR” en los PDFs para que el funcionario de la alcaldía haga la correspondiente
                            actualización de los datos en el módulo de configuración general y salga el nombre
                            correctamente.
                            <br><br>
                            Se realiza a su vez la conexión de este modulo con la pagina principal de la plataforma,
                            ahora los nombres del presidente y la mesa directiva saldran dependiendo como este
                            configurado en la plataforma.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Presupuesto</span><br><br>
                            <span class="badge badge-pill badge-danger">Pagina Principal</span><br><br>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>06 de Julio del 2021</td>
                        <td>Se actualiza la interfaz principal del presupuesto con el menú desplegable de "Ejecución
                            Trimestral". En este menú desplegable el usuario puede generar las ejecuciones trimestrales
                            del presupuesto de egresos.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Presupuesto</span>
                        </td>
                    </tr>
                    <tr>
                        <td>29 de Junio del 2021</td>
                        <td>Se empieza a realizar el proceso de habilitar el módulo de configuración general, en este módulo se
                            realizarán los ajustes para las firmas de los PDFs, a su vez se usará la información para la interfaz
                            principal de la plataforma al mostrar los nombres de la mesa directiva del concejo.
                            <br><br>
                            Se crea la tabla en la base de datos encargada de almacenar los nombres para las firmas de los distintos
                            PDFs que se utilizan en los procesos del presupuesto.
                            <br><br>
                            Se inicia el proceso de ajustar la interfaz de configuración general para llevar a cabo el proceso de
                            creación, editar, eliminar y actualizar las firmas.
                            <br><br>
                            Los nombres de los responsables para la firma serán almacenados junto con el periodo en el que deberá
                            salir el nombre, debido a que la plataforma almacena PDFs de vigencias anteriores se debe conservar
                            los correspondientes responsables.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Presupuesto</span><br><br>
                            <span class="badge badge-pill badge-danger">Base de Datos</span><br><br>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>25 de Junio del 2021</td>
                        <td>Se agrega la funcionalidad de que el usuario pueda dar clic en el nombre del CDP en la interfaz del registro
                            para ser direccionado al registro asignado, de esta forma el usuario podrá acceder de una manera más fácil y
                            rápida a la información del CDP asignado si es necesario.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>21 de Junio del 2021</td>
                        <td>Se ha agregado la nueva funcionalidad de anular registros, el botón de anular se encuentra en la página de
                            cada registro, este botón solo saldrá cuando el registro esté finalizado y no cuente con ninguna orden de
                            pago asignada al mismo.
                            <br><br>
                            Cuando un registro se encuentre anulado se observa en la información un mensaje que se encuentra anulado,
                            se desactivan algunas opciones del registro para que se vuelva un registro únicamente informativo, debido
                            a que ya no se podrá usar para la creación de órdenes de pago ni se puede eliminar.
                            <br><br>
                            Al dar clic en el botón de anular registro el dinero que tiene asignado será retornado a su correspondiente
                            CDP, el saldo del Registro pasará a $0 y cambiará su estado ha <i><b>anulado</b></i>.
                        </td>
                        <td>
                            <span class="badge badge-pill badge-danger">Presupuesto</span><br><br>
                            <span class="badge badge-pill badge-danger">Base de Datos</span><br><br>
                            <span class="badge badge-pill badge-danger">General</span>
                        </td>
                    </tr>
                    <tr>
                        <td>11 de Junio del 2021</td>
                        <td>Se agrega la validación de si el CDP cuenta con registros asignados para no mostrar una tabla vacía,
                            en el caso de contar con registros asignados se muestran en la tabla, en el caso contrario se muestra
                            un mensaje informativo.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>08 de Junio del 2021</td>
                        <td>Se ajustan las respectivas validaciones del botón de anular CDP para que únicamente se pueda usar cuando
                            el CDP no tiene un registro asignado o si el dinero no ha sido retirado del mismo.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>03 de Junio del 2021</td>
                        <td>Se agrega la información del saldo disponible del registro debido a que no se estaba mostrando ese valor
                            en la página del registro. Y de esta forma es más completa la información que se muestra al usuario del
                            registro que se está revisando.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>28 de Mayo del 2021</td>
                        <td>Se realiza la actualización de la vista de cada registro para que el usuario pueda observar las órdenes de
                            pago que han sido asignadas al registro, en el caso de que el registro no cuente con órdenes de pago se
                            muestra un mensaje informativo.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>17 de Mayo del 2021</td>
                        <td>Se ajusta el formulario del cambio de contraseña para que tenga un ajuste mejorado con textos correctos.</td>
                        <td><span class="badge badge-pill badge-danger">Usuario</span></td>
                    </tr>
                    <tr>
                        <td>14 de Mayo del 2021</td>
                        <td>Se corrige el diseño del menú desplegable al dar clic en el usuario, se ajusta el color de fondo de la
                            imagen, se ajusta la posición del botón de subir imagen para que sea más visible, se ajusta el texto del
                            tipo de cuenta de usuario debido a que no se mostraba completamente el botón y se estaba generando un bug
                            visual.</td>
                        <td><span class="badge badge-pill badge-danger">Usuario</span></td>
                    </tr>
                    <tr>
                        <td>13 de Mayo del 2021</td>
                        <td>Se realiza el ajuste a la imagen que se muestra por defecto al usuario cuando no cuenta con una imagen
                            almacenada. Este error se presentaba debido a que se estaba llamando a una imagen inexistente en la
                            plataforma.</td>
                        <td><span class="badge badge-pill badge-danger">General</span></td>
                    </tr>
                    <tr>
                        <td>11 de Mayo del 2021</td>
                        <td>Se arregla el diseño del botón que direcciona a los CDP’s en la interfaz principal para que se ajuste
                            al diseño de los demás botones tanto de registros como órdenes de pago y pagos.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>07 de Mayo del 2021</td>
                        <td>Se aumenta el número de registros que se muestran de 5 a 10 en la tabla del presupuesto principal,
                            de esta forma se ve más información de una manera más cómoda para el usuario.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>29 de Abril del 2021</td>
                        <td>Se realiza la corrección de unos valores erróneos que se estaban presentando en la base de datos y
                            generaban valores negativos en el presupuesto, estos valores fueron actualizados y corregidos.</td>
                        <td><span class="badge badge-pill badge-danger">Base de Datos</span></td>
                    </tr>
                    <tr>
                        <td>27 de Abril del 2021</td>
                        <td>Se ajusta el botón de PDF de los CDPs para cuando han sido anulados no salga el cuadro en blanco si
                            no con el mensaje de anulado. Este cambio es realizado en la tabla tanto de CDPs del presupuesto como
                            en la interfaz de CDPs</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>26 de Abril del 2021</td>
                        <td>Se realiza la instalación de la librería zip en el servidor debido que no estaba y es necesaria.</td>
                        <td><span class="badge badge-pill badge-danger">Servidor</span></td>
                    </tr>
                    <tr>
                        <td>26 de Abril del 2021</td>
                        <td>Se cambia el texto del botón "ver orden de pago" por el icono de un ojo. Este cambio es realizado en la interfaz de los pagos.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    <tr>
                        <td>23 de Abril del 2021</td>
                        <td>Se agrega el número del registro en la interfaz de la orden de pago para que sea más fácil encontrar el registro en caso de ser necesario.</td>
                        <td><span class="badge badge-pill badge-danger">Presupuesto</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn-sm btn-primary" data-dismiss="modal">Salir</button>
                </center>
            </div>
        </div>
    </div>
</div>