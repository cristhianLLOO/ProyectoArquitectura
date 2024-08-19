<?php

namespace App\Http\Controllers;


use App\Models\ciudad;
use App\Models\compra;
use App\Models\pago;
use App\Models\pais;
use App\Models\producto;
use App\Models\vendedor;
use App\Models\venta;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Cupon;
use App\Models\tarjeta;
use App\Models\Productos;
use App\Models\carrito;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function new_account(){
        return view("new_account");
    }
    public function about(){
        return view("about");
    }
    public function user(){
        return view("user_profile");
    }
    public function index(){
        $product=DB::table('Productos')->get();
        return view("index",compact('product'));
    }
    public function insertarProductos(){
        $product=DB::table('Productos')->get();
        return view("crear_productos",compact('product'));
    }
    public function log(){
        return view("login");
    }
    public function cont(){
        return view("recupcont");
    }
    public function ven(){
        return view('auth.login_admin');
    }
    
    public function icomo(){
        return view("iniciarcomo");
    }
    public function crearcu(){
        return view("crearcu");
    }
    public function crearcuven(){
        return view("crearcuvended");
    }
    public function carr(){
        return view("carrito");
    }
    public function dev(){
        return view("devolucion");
    }
    public function product(){
        return view('producto');
    }
    public function pag(){
        return view("pagos");
    }
    public function regs(){
        return view("cupones");
    }
    public function admin(){
        return view("administrador");
    }
    public function tab(){
        $vend=Seller::all();
        return view("tabla",compact('vend'));
    }
    public function tabl(){
        $cupon=Cupon::all();
        return view("tabla2",compact('cupon'));
    }    
    public function ViewProducto($id){
        
        return view("producto",compact('product'));
    }

    public function productClas($cat){
        $product=DB::table('Productos')->where('categoria', 'like', $cat . '%')->get();
        return view("index",compact('product'));
    }

    public function tab3(){
            $tarjeta=Tarjeta::all();
            return view("pagomio",compact('tarjeta'));
    }
    
    public function create (Request $request){
        $cupon=new Cupon;
        $cupon->nombre=$request->name;
        $cupon->descuento=$request->discount;
        $cupon->fecha_de_vencimiento=$request->date;
        $cupon->save();
        $cupon= Cupon::all();
        return view ('cupones',compact('cupon'));
        
    }

    public function upload(){
        return view("cupones");
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('crearcu');
    }

    public function tarjetitas (Request $request){
        $tarjeta=new Tarjeta;
        $tarjeta->titular=$request->name;
        $tarjeta->numero_de_cuenta=$request->discount;
        $tarjeta->banco=$request->date;
        $tarjeta->fecha_de_caducidad=$request->date;
        $tarjeta->cvv=$request->date;
        $tarjeta->save();
        $tarjeta= Tarjeta::all();
        return view ('pagomio',compact('tarjeta'));
        
    }
    public function upload1(){
        return view("pagomio");
    }



    public function obtenerCarritoCompras()
    {
        $carritoCompras = carrito::all();
        return view('carrito', compact('carritoCompras'));
    }

    public function obtenerCiudades()
    {
        $ciudades = ciudad::all();
        return view('tu_vista', compact('ciudades'));
    }

    public function obtenerCompras()
    {
        $compras = compra::all();
        return view('tu_vista', compact('compras'));
    }

    public function obtenerCupones()
    {
        $cupones = Cupon::all();
        return view('tu_vista', compact('cupones'));
    }

    

    public function obtenerOpcionesPago()
    {
        $opcionesPago = pago::all();
        return view('tu_vista', compact('opcionesPago'));
    }

    public function obtenerPaises()
    {
        $paises = pais::all();
        return view('tu_vista', compact('paises'));
    }

    public function obtenerProductos()
    {
        $productos = producto::all();
        return view('tu_vista', compact('productos'));
    }

    public function obtenerSellers()
    {
        $Sellers = Seller::all();
        return view('tu_vista', compact('Sellers'));
    }

    public function obtenerTarjetas()
    {
        $tarjetas = Tarjeta::all();
        return view('tu_vista', compact('tarjetas'));
    }

    public function obtenerUsuarios()
    {
        $usuarios = User::all();
        return view('tu_vista', compact('usuarios'));
    }

    public function obtenerVendedores()
    {
        $vendedores = vendedor::all();
        return view('tu_vista', compact('vendedores'));
    }

    public function obtenerVentas()
    {
        $ventas = venta::all();
        return view('tu_vista', compact('ventas'));
    }

   
    public function showUser($id){
        $user = User::where('id_usuario', $id)->first();
        return view('user_profile', compact('user'));
    }
    public function loginUser(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $product = DB::table('Productos')->get();
            return view("index", compact('product'));
        } else {
            return redirect()->back()->withErrors([
                'email' => 'El correo electrónico no es válido',
                'password' => 'La contraseña no es válida',
            ]);
        }
    }
    
    public function addShop(Request $request){
        $carrito = new carrito;
        $carrito->id_usuario = Auth::user()->id_usuario;
        $carrito->id_producto = $request->id_prod;
        $carrito->cantidad = $request->cantidad;

        $carrito->save();

        return redirect()->route('showShop');
    }

    public function showShop(){
    $usuarioActual = Auth::user()->id_usuario;

    $carrito = carrito::where('id_usuario', $usuarioActual)->get();
    $productos = [];

    $total = 0;
    foreach ($carrito as $producto) {
        $id_producto_carrito = $producto->id_producto;
        $product = Productos::where('id_producto', $id_producto_carrito)->first();

        $productos[] = $product;
        $total = $total + ($product->precio * $producto->cantidad);
    }


        return view("carrito", compact('productos','total','carrito'));
        
    }

    public function eliminarCarrito($id){
        $carrito = carrito::where('id_producto', $id)->first();
        $carrito->delete();

        return redirect()->route('showShop');
    } 

    public function show($id)
{
    $producto = Productos::findOrFail($id);
    return view('ver_producto', compact('producto'));
}

//**Nuevo todo este metodo */
public function storeUser(Request $request)
{
    // Validar los datos del formulario de registro de usuario si es necesario

    // Crear una nueva instancia de User y asignar los datos recibidos
    $usuario = new User;
    $usuario->nombre = $request->nombre;
    $usuario->apellido = $request->apellido;
    $usuario->email = $request->correo;
    $usuario->telefono = $request->telefono;
    //**Correccion */
    $usuario->password = Hash::make($request->contrasena); // Asegúrate de hacer hash de la contraseña antes de guardarla

    // Guardar el usuario en la base de datos
    $usuario->save();

    // Redirigir o devolver una respuesta según sea necesario
    return redirect()->route('index')->with('success', '¡Usuario registrado correctamente!');
}


public function showProfile()
    {
        $user = auth()->user();
        $carrito = carrito::where('id_usuario', $user->id_usuario)->with('producto')->get();
        return view('user.profile', compact('user', 'carrito'));
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('productos.index');
    }





}