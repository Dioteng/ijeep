PGDMP     5    *                 {            ite152    14.5    14.5 Y    W           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            X           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            Y           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            Z           1262    49163    ite152    DATABASE     h   CREATE DATABASE ite152 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_Philippines.1252';
    DROP DATABASE ite152;
                postgres    false            g           1247    82227    dml_type    TYPE     k   CREATE TYPE public.dml_type AS ENUM (
    'Employee Hired',
    'Account Updated',
    'Employee Fired'
);
    DROP TYPE public.dml_type;
       public          postgres    false            d           1247    73927    emp_role    TYPE     G   CREATE TYPE public.emp_role AS ENUM (
    'Driver',
    'Conductor'
);
    DROP TYPE public.emp_role;
       public          postgres    false            m           1247    98587 
   j_dml_type    TYPE     b   CREATE TYPE public.j_dml_type AS ENUM (
    'Added',
    'Updated',
    'Maintenance/Disposed'
);
    DROP TYPE public.j_dml_type;
       public          postgres    false            �            1255    90413    cond_trig_func()    FUNCTION     �  CREATE FUNCTION public.cond_trig_func() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	IF (TG_OP = 'INSERT') 
		THEN INSERT INTO employee_logs(c_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (NEW.conductor_id, 'Conductor', NEW.firstname, NEW.lastname, NEW.address, 'Employee Hired', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'UPDATE')
		THEN INSERT INTO employee_logs(c_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (OLD.conductor_id, 'Conductor', OLD.firstname, OLD.lastname, OLD.address, 'Account Updated', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'DELETE')
		THEN INSERT INTO employee_logs(c_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (OLD.conductor_id, 'Conductor', OLD.firstname, OLD.lastname, OLD.address, 'Employee Fired', user, now());
	RETURN OLD;
	END IF;

END;
$$;
 '   DROP FUNCTION public.cond_trig_func();
       public          postgres    false            �            1255    73762    count_conductors(text)    FUNCTION     �   CREATE FUNCTION public.count_conductors(conductors text) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    result integer;
BEGIN
    EXECUTE 'SELECT COUNT(*) FROM ' || conductors INTO result;
    RETURN result;
END;
$$;
 8   DROP FUNCTION public.count_conductors(conductors text);
       public          postgres    false            �            1255    73763    count_drivers(text)    FUNCTION     �   CREATE FUNCTION public.count_drivers(drivers text) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    result integer;
BEGIN
    EXECUTE 'SELECT COUNT(*) FROM ' || drivers INTO result;
    RETURN result;
END;
$$;
 2   DROP FUNCTION public.count_drivers(drivers text);
       public          postgres    false            �            1255    73764    count_vehicles(text)    FUNCTION     �   CREATE FUNCTION public.count_vehicles(jeep text) RETURNS integer
    LANGUAGE plpgsql
    AS $$
DECLARE
    result integer;
BEGIN
    EXECUTE 'SELECT COUNT(*) FROM ' || jeep INTO result;
    RETURN result;
END;
$$;
 0   DROP FUNCTION public.count_vehicles(jeep text);
       public          postgres    false            �            1255    90412    delete_conductor(text, integer) 	   PROCEDURE     �   CREATE PROCEDURE public.delete_conductor(IN conductors text, IN id integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    EXECUTE 'DELETE FROM ' || conductors || ' WHERE conductor_id = ' || id;
END;
$$;
 K   DROP PROCEDURE public.delete_conductor(IN conductors text, IN id integer);
       public          postgres    false            �            1255    73768    delete_driver(text, integer) 	   PROCEDURE     �   CREATE PROCEDURE public.delete_driver(IN drivers text, IN id integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    EXECUTE 'DELETE FROM ' || drivers || ' WHERE driver_id = ' || id;
END;
$$;
 E   DROP PROCEDURE public.delete_driver(IN drivers text, IN id integer);
       public          postgres    false            �            1255    82222    delete_duty(text, integer) 	   PROCEDURE     �   CREATE PROCEDURE public.delete_duty(IN trans_duty text, IN _id integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    EXECUTE 'DELETE FROM ' || trans_duty || ' WHERE td_id = ' || _id;
END;
$$;
 G   DROP PROCEDURE public.delete_duty(IN trans_duty text, IN _id integer);
       public          postgres    false            �            1255    73893    delete_vehicle(text, integer) 	   PROCEDURE     �   CREATE PROCEDURE public.delete_vehicle(IN jeep text, IN id integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    EXECUTE 'DELETE FROM ' || jeep || ' WHERE vehicle_id = ' || id;
END;
$$;
 C   DROP PROCEDURE public.delete_vehicle(IN jeep text, IN id integer);
       public          postgres    false            �            1255    98584    driver_trig_func()    FUNCTION     �  CREATE FUNCTION public.driver_trig_func() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	IF (TG_OP = 'INSERT') 
		THEN INSERT INTO employee_logs(d_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (NEW.driver_id, 'Driver', NEW.firstname, NEW.lastname, NEW.address, 'Employee Hired', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'UPDATE')
		THEN INSERT INTO employee_logs(d_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (OLD.driver_id, 'Driver', OLD.firstname, OLD.lastname, OLD.address, 'Account Updated', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'DELETE')
		THEN INSERT INTO employee_logs(d_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) 
		VALUES (OLD.driver_id, 'Driver', OLD.firstname, OLD.lastname, OLD.address, 'Employee Fired', user, now());
	RETURN OLD;
	END IF;
END;
$$;
 )   DROP FUNCTION public.driver_trig_func();
       public          postgres    false            �            1255    98612    duty_logs()    FUNCTION     ?  CREATE FUNCTION public.duty_logs() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	IF (TG_OP = 'DELETE')
	THEN INSERT INTO duty_logs(td_id, v_id, d_id, c_id, route_loc, depart_time, arrive_time) 
	VALUES (OLD.td_id, OLD.v_id, OLD.d_id, OLD.c_id, OLD.route_loc, OLD.set_off, now());
	RETURN OLD;
	END IF;
END;
$$;
 "   DROP FUNCTION public.duty_logs();
       public          postgres    false            �            1255    57355 o   insert_conductor(character varying, character varying, character varying, character varying, character varying) 	   PROCEDURE     c  CREATE PROCEDURE public.insert_conductor(IN fname character varying, IN lname character varying, IN email character varying, IN address character varying, IN password character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO conductors(firstname, lastname, email, address, password) VALUES (fname, lname, email, address, password);
END; $$;
 �   DROP PROCEDURE public.insert_conductor(IN fname character varying, IN lname character varying, IN email character varying, IN address character varying, IN password character varying);
       public          postgres    false            �            1255    73972 Y   insert_driver(character varying, character varying, character varying, character varying) 	   PROCEDURE     3  CREATE PROCEDURE public.insert_driver(IN fname character varying, IN lname character varying, IN address character varying, IN license character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO drivers(firstname, lastname, address, license_no) VALUES (fname, lname, address, license);
END; $$;
 �   DROP PROCEDURE public.insert_driver(IN fname character varying, IN lname character varying, IN address character varying, IN license character varying);
       public          postgres    false            �            1255    98746 V   insert_duty(integer, integer, integer, character varying, timestamp without time zone) 	   PROCEDURE     7  CREATE PROCEDURE public.insert_duty(IN v_id integer, IN d_id integer, IN c_id integer, IN _route character varying, IN _set_off timestamp without time zone)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO trans_duty(v_id, d_id, c_id, route_loc, set_off) 
	VALUES(v_id, d_id, c_id, _route, now());
END; $$;
 �   DROP PROCEDURE public.insert_duty(IN v_id integer, IN d_id integer, IN c_id integer, IN _route character varying, IN _set_off timestamp without time zone);
       public          postgres    false            �            1255    73975 P   insert_vehicle(character varying, character varying, character varying, integer) 	   PROCEDURE     >  CREATE PROCEDURE public.insert_vehicle(IN plate_num character varying, IN vehicle_name character varying, IN v_type character varying, IN capacity integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO jeep(plate_num, vehicle_name, v_type, capacity) VALUES (plate_num, vehicle_name, v_type, capacity);
END; $$;
 �   DROP PROCEDURE public.insert_vehicle(IN plate_num character varying, IN vehicle_name character varying, IN v_type character varying, IN capacity integer);
       public          postgres    false            �            1255    98602    jeep_trig_func()    FUNCTION     �  CREATE FUNCTION public.jeep_trig_func() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
	IF (TG_OP = 'INSERT') 
		THEN INSERT INTO jeep_logs(v_id, jeep_name, vtype, plate_num, capacity, trans_type, trans_user, trans_date) 
		VALUES (NEW.vehicle_id, NEW.vehicle_name, NEW.v_type, NEW.plate_num, NEW.capacity, 'Added', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'UPDATE')
		THEN INSERT INTO jeep_logs(v_id, jeep_name, vtype, plate_num, capacity, trans_type, trans_user, trans_date) 
		VALUES (OLD.vehicle_id, OLD.vehicle_name, OLD.v_type, OLD.plate_num, OLD.capacity, 'Updated', user, now());
	RETURN NEW;
	ELSEIF (TG_OP = 'DELETE')
		THEN INSERT INTO jeep_logs(v_id, jeep_name, vtype, plate_num, capacity, trans_type, trans_user, trans_date) 
		VALUES (OLD.vehicle_id, OLD.vehicle_name, OLD.v_type, OLD.plate_num, OLD.capacity, 'Maintenance/Disposed', user, now());
	RETURN OLD;
	END IF;
END;
$$;
 '   DROP FUNCTION public.jeep_trig_func();
       public          postgres    false            �            1255    74052 o   up_cond(integer, character varying, character varying, character varying, character varying, character varying) 	   PROCEDURE     �  CREATE PROCEDURE public.up_cond(IN _id integer, IN fname character varying, IN lname character varying, IN _email character varying, IN _address character varying, IN _password character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE conductors
    SET firstname = fname,
		lastname = lname,
        email = _email,
		address = _address,
        password = _password
    WHERE conductor_id = _id;
END;
$$;
 �   DROP PROCEDURE public.up_cond(IN _id integer, IN fname character varying, IN lname character varying, IN _email character varying, IN _address character varying, IN _password character varying);
       public          postgres    false            �            1255    74053 \   up_driv(integer, character varying, character varying, character varying, character varying) 	   PROCEDURE     c  CREATE PROCEDURE public.up_driv(IN _id integer, IN fname character varying, IN lname character varying, IN _address character varying, IN license character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE drivers
    SET firstname = fname,
		lastname = lname,
		address = _address,
        license_no = license
    WHERE driver_id = _id;
END;
$$;
 �   DROP PROCEDURE public.up_driv(IN _id integer, IN fname character varying, IN lname character varying, IN _address character varying, IN license character varying);
       public          postgres    false            �            1255    82225 >   up_duty(integer, integer, integer, integer, character varying) 	   PROCEDURE     =  CREATE PROCEDURE public.up_duty(IN _id integer, IN vehicle integer, IN driver integer, IN conductor integer, IN _route character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE trans_duty
    SET v_id = vehicle,
		d_id = driver,
		c_id = conductor,
        route_loc = _route
    WHERE td_id = _id;
END;
$$;
 �   DROP PROCEDURE public.up_duty(IN _id integer, IN vehicle integer, IN driver integer, IN conductor integer, IN _route character varying);
       public          postgres    false            �            1255    74055 R   up_jeep(integer, character varying, character varying, character varying, integer) 	   PROCEDURE     V  CREATE PROCEDURE public.up_jeep(IN _id integer, IN plate character varying, IN vname character varying, IN vtype character varying, IN _capacity integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE jeep
    SET plate_num = plate,
		vehicle_name = vname,
		v_type = vtype,
        capacity = _capacity
    WHERE vehicle_id = _id;
END;
$$;
 �   DROP PROCEDURE public.up_jeep(IN _id integer, IN plate character varying, IN vname character varying, IN vtype character varying, IN _capacity integer);
       public          postgres    false            �            1259    49165    admin    TABLE       CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    username character varying(40) NOT NULL,
    password character varying(40) NOT NULL,
    fname character varying(40) NOT NULL,
    lname character varying(40) NOT NULL,
    address character varying(40) NOT NULL
);
    DROP TABLE public.admin;
       public         heap    postgres    false            �            1259    49164    admin_admin_id_seq    SEQUENCE     �   CREATE SEQUENCE public.admin_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.admin_admin_id_seq;
       public          postgres    false    210            [           0    0    admin_admin_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.admin_admin_id_seq OWNED BY public.admin.admin_id;
          public          postgres    false    209            �            1259    49190 
   conductors    TABLE     (  CREATE TABLE public.conductors (
    conductor_id integer NOT NULL,
    firstname character varying(100) NOT NULL,
    lastname character varying(100) NOT NULL,
    email character varying(150) NOT NULL,
    address character varying(100) NOT NULL,
    password character varying(50) NOT NULL
);
    DROP TABLE public.conductors;
       public         heap    postgres    false            �            1259    49189    conductors_conductor_id_seq    SEQUENCE     �   CREATE SEQUENCE public.conductors_conductor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.conductors_conductor_id_seq;
       public          postgres    false    214            \           0    0    conductors_conductor_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.conductors_conductor_id_seq OWNED BY public.conductors.conductor_id;
          public          postgres    false    213            �            1259    49181    drivers    TABLE       CREATE TABLE public.drivers (
    driver_id integer NOT NULL,
    firstname character varying(100) NOT NULL,
    lastname character varying(100) NOT NULL,
    license_no character varying(100) NOT NULL,
    address character varying(100) NOT NULL,
    driver_license bytea
);
    DROP TABLE public.drivers;
       public         heap    postgres    false            �            1259    49180    drivers_driver_id_seq    SEQUENCE     �   CREATE SEQUENCE public.drivers_driver_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.drivers_driver_id_seq;
       public          postgres    false    212            ]           0    0    drivers_driver_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.drivers_driver_id_seq OWNED BY public.drivers.driver_id;
          public          postgres    false    211            �            1259    98665 	   duty_logs    TABLE     1  CREATE TABLE public.duty_logs (
    dlog_id integer NOT NULL,
    td_id integer NOT NULL,
    v_id integer NOT NULL,
    d_id integer NOT NULL,
    c_id integer NOT NULL,
    route_loc character varying NOT NULL,
    depart_time timestamp without time zone,
    arrive_time timestamp without time zone
);
    DROP TABLE public.duty_logs;
       public         heap    postgres    false            �            1259    98664    duty_logs_dlog_id_seq    SEQUENCE     �   CREATE SEQUENCE public.duty_logs_dlog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.duty_logs_dlog_id_seq;
       public          postgres    false    222            ^           0    0    duty_logs_dlog_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.duty_logs_dlog_id_seq OWNED BY public.duty_logs.dlog_id;
          public          postgres    false    221            �            1259    82234    employee_logs    TABLE     �  CREATE TABLE public.employee_logs (
    elog_id integer NOT NULL,
    d_id integer,
    c_id integer,
    employee_role public.emp_role NOT NULL,
    firstname character varying(50) NOT NULL,
    lastname character varying(50) NOT NULL,
    address character varying(50) NOT NULL,
    trans_type public.dml_type NOT NULL,
    trans_user character varying NOT NULL,
    trans_date timestamp without time zone NOT NULL
);
 !   DROP TABLE public.employee_logs;
       public         heap    postgres    false    871    868            �            1259    82233    employee_logs_elog_id_seq    SEQUENCE     �   CREATE SEQUENCE public.employee_logs_elog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.employee_logs_elog_id_seq;
       public          postgres    false    218            _           0    0    employee_logs_elog_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.employee_logs_elog_id_seq OWNED BY public.employee_logs.elog_id;
          public          postgres    false    217            �            1259    73853    jeep    TABLE     �   CREATE TABLE public.jeep (
    vehicle_id integer NOT NULL,
    plate_num character varying(50) NOT NULL,
    vehicle_name character varying(50) NOT NULL,
    capacity integer NOT NULL,
    v_type character varying(50) NOT NULL,
    img bytea
);
    DROP TABLE public.jeep;
       public         heap    postgres    false            �            1259    98594 	   jeep_logs    TABLE     �  CREATE TABLE public.jeep_logs (
    jlog_id integer NOT NULL,
    v_id integer,
    jeep_name character varying(50) NOT NULL,
    vtype character varying(50) NOT NULL,
    plate_num character varying(50) NOT NULL,
    capacity integer NOT NULL,
    trans_type public.j_dml_type NOT NULL,
    trans_user character varying NOT NULL,
    trans_date timestamp without time zone NOT NULL
);
    DROP TABLE public.jeep_logs;
       public         heap    postgres    false    877            �            1259    98593    jeep_logs_jlog_id_seq    SEQUENCE     �   CREATE SEQUENCE public.jeep_logs_jlog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.jeep_logs_jlog_id_seq;
       public          postgres    false    220            `           0    0    jeep_logs_jlog_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.jeep_logs_jlog_id_seq OWNED BY public.jeep_logs.jlog_id;
          public          postgres    false    219            �            1259    73852    jeep_vehicle_id_seq    SEQUENCE     �   CREATE SEQUENCE public.jeep_vehicle_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.jeep_vehicle_id_seq;
       public          postgres    false    216            a           0    0    jeep_vehicle_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.jeep_vehicle_id_seq OWNED BY public.jeep.vehicle_id;
          public          postgres    false    215            �            1259    98721 
   trans_duty    TABLE     �   CREATE TABLE public.trans_duty (
    td_id integer NOT NULL,
    v_id integer NOT NULL,
    d_id integer NOT NULL,
    c_id integer NOT NULL,
    route_loc character varying NOT NULL,
    set_off timestamp without time zone
);
    DROP TABLE public.trans_duty;
       public         heap    postgres    false            �            1259    98720    trans_duty_td_id_seq    SEQUENCE     �   CREATE SEQUENCE public.trans_duty_td_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.trans_duty_td_id_seq;
       public          postgres    false    224            b           0    0    trans_duty_td_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.trans_duty_td_id_seq OWNED BY public.trans_duty.td_id;
          public          postgres    false    223            �           2604    49168    admin admin_id    DEFAULT     p   ALTER TABLE ONLY public.admin ALTER COLUMN admin_id SET DEFAULT nextval('public.admin_admin_id_seq'::regclass);
 =   ALTER TABLE public.admin ALTER COLUMN admin_id DROP DEFAULT;
       public          postgres    false    210    209    210            �           2604    49193    conductors conductor_id    DEFAULT     �   ALTER TABLE ONLY public.conductors ALTER COLUMN conductor_id SET DEFAULT nextval('public.conductors_conductor_id_seq'::regclass);
 F   ALTER TABLE public.conductors ALTER COLUMN conductor_id DROP DEFAULT;
       public          postgres    false    213    214    214            �           2604    49184    drivers driver_id    DEFAULT     v   ALTER TABLE ONLY public.drivers ALTER COLUMN driver_id SET DEFAULT nextval('public.drivers_driver_id_seq'::regclass);
 @   ALTER TABLE public.drivers ALTER COLUMN driver_id DROP DEFAULT;
       public          postgres    false    211    212    212            �           2604    98668    duty_logs dlog_id    DEFAULT     v   ALTER TABLE ONLY public.duty_logs ALTER COLUMN dlog_id SET DEFAULT nextval('public.duty_logs_dlog_id_seq'::regclass);
 @   ALTER TABLE public.duty_logs ALTER COLUMN dlog_id DROP DEFAULT;
       public          postgres    false    222    221    222            �           2604    82237    employee_logs elog_id    DEFAULT     ~   ALTER TABLE ONLY public.employee_logs ALTER COLUMN elog_id SET DEFAULT nextval('public.employee_logs_elog_id_seq'::regclass);
 D   ALTER TABLE public.employee_logs ALTER COLUMN elog_id DROP DEFAULT;
       public          postgres    false    218    217    218            �           2604    73856    jeep vehicle_id    DEFAULT     r   ALTER TABLE ONLY public.jeep ALTER COLUMN vehicle_id SET DEFAULT nextval('public.jeep_vehicle_id_seq'::regclass);
 >   ALTER TABLE public.jeep ALTER COLUMN vehicle_id DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    98597    jeep_logs jlog_id    DEFAULT     v   ALTER TABLE ONLY public.jeep_logs ALTER COLUMN jlog_id SET DEFAULT nextval('public.jeep_logs_jlog_id_seq'::regclass);
 @   ALTER TABLE public.jeep_logs ALTER COLUMN jlog_id DROP DEFAULT;
       public          postgres    false    220    219    220            �           2604    98724    trans_duty td_id    DEFAULT     t   ALTER TABLE ONLY public.trans_duty ALTER COLUMN td_id SET DEFAULT nextval('public.trans_duty_td_id_seq'::regclass);
 ?   ALTER TABLE public.trans_duty ALTER COLUMN td_id DROP DEFAULT;
       public          postgres    false    224    223    224            F          0    49165    admin 
   TABLE DATA           T   COPY public.admin (admin_id, username, password, fname, lname, address) FROM stdin;
    public          postgres    false    210   b�       J          0    49190 
   conductors 
   TABLE DATA           a   COPY public.conductors (conductor_id, firstname, lastname, email, address, password) FROM stdin;
    public          postgres    false    214   ��       H          0    49181    drivers 
   TABLE DATA           f   COPY public.drivers (driver_id, firstname, lastname, license_no, address, driver_license) FROM stdin;
    public          postgres    false    212   `�       R          0    98665 	   duty_logs 
   TABLE DATA           j   COPY public.duty_logs (dlog_id, td_id, v_id, d_id, c_id, route_loc, depart_time, arrive_time) FROM stdin;
    public          postgres    false    222   ��       N          0    82234    employee_logs 
   TABLE DATA           �   COPY public.employee_logs (elog_id, d_id, c_id, employee_role, firstname, lastname, address, trans_type, trans_user, trans_date) FROM stdin;
    public          postgres    false    218   �       L          0    73853    jeep 
   TABLE DATA           Z   COPY public.jeep (vehicle_id, plate_num, vehicle_name, capacity, v_type, img) FROM stdin;
    public          postgres    false    216   ��       P          0    98594 	   jeep_logs 
   TABLE DATA           }   COPY public.jeep_logs (jlog_id, v_id, jeep_name, vtype, plate_num, capacity, trans_type, trans_user, trans_date) FROM stdin;
    public          postgres    false    220   =�       T          0    98721 
   trans_duty 
   TABLE DATA           Q   COPY public.trans_duty (td_id, v_id, d_id, c_id, route_loc, set_off) FROM stdin;
    public          postgres    false    224   ��       c           0    0    admin_admin_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.admin_admin_id_seq', 1, true);
          public          postgres    false    209            d           0    0    conductors_conductor_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.conductors_conductor_id_seq', 39, true);
          public          postgres    false    213            e           0    0    drivers_driver_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.drivers_driver_id_seq', 25, true);
          public          postgres    false    211            f           0    0    duty_logs_dlog_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.duty_logs_dlog_id_seq', 13, true);
          public          postgres    false    221            g           0    0    employee_logs_elog_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.employee_logs_elog_id_seq', 71, true);
          public          postgres    false    217            h           0    0    jeep_logs_jlog_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.jeep_logs_jlog_id_seq', 11, true);
          public          postgres    false    219            i           0    0    jeep_vehicle_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.jeep_vehicle_id_seq', 32, true);
          public          postgres    false    215            j           0    0    trans_duty_td_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.trans_duty_td_id_seq', 11, true);
          public          postgres    false    223            �           2606    49170    admin admin_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_pkey;
       public            postgres    false    210            �           2606    49197    conductors conductors_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.conductors
    ADD CONSTRAINT conductors_pkey PRIMARY KEY (conductor_id);
 D   ALTER TABLE ONLY public.conductors DROP CONSTRAINT conductors_pkey;
       public            postgres    false    214            �           2606    49188    drivers drivers_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.drivers
    ADD CONSTRAINT drivers_pkey PRIMARY KEY (driver_id);
 >   ALTER TABLE ONLY public.drivers DROP CONSTRAINT drivers_pkey;
       public            postgres    false    212            �           2606    98672    duty_logs duty_logs_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.duty_logs
    ADD CONSTRAINT duty_logs_pkey PRIMARY KEY (dlog_id);
 B   ALTER TABLE ONLY public.duty_logs DROP CONSTRAINT duty_logs_pkey;
       public            postgres    false    222            �           2606    82241     employee_logs employee_logs_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.employee_logs
    ADD CONSTRAINT employee_logs_pkey PRIMARY KEY (elog_id);
 J   ALTER TABLE ONLY public.employee_logs DROP CONSTRAINT employee_logs_pkey;
       public            postgres    false    218            �           2606    98601    jeep_logs jeep_logs_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.jeep_logs
    ADD CONSTRAINT jeep_logs_pkey PRIMARY KEY (jlog_id);
 B   ALTER TABLE ONLY public.jeep_logs DROP CONSTRAINT jeep_logs_pkey;
       public            postgres    false    220            �           2606    73858    jeep jeep_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.jeep
    ADD CONSTRAINT jeep_pkey PRIMARY KEY (vehicle_id);
 8   ALTER TABLE ONLY public.jeep DROP CONSTRAINT jeep_pkey;
       public            postgres    false    216            �           2606    98728    trans_duty trans_duty_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.trans_duty
    ADD CONSTRAINT trans_duty_pkey PRIMARY KEY (td_id);
 D   ALTER TABLE ONLY public.trans_duty DROP CONSTRAINT trans_duty_pkey;
       public            postgres    false    224            �           2620    90419    conductors cond_changes    TRIGGER     �   CREATE TRIGGER cond_changes AFTER INSERT OR DELETE OR UPDATE ON public.conductors FOR EACH ROW EXECUTE FUNCTION public.cond_trig_func();
 0   DROP TRIGGER cond_changes ON public.conductors;
       public          postgres    false    250    214            �           2620    98585    drivers driv_changes    TRIGGER     �   CREATE TRIGGER driv_changes AFTER INSERT OR DELETE OR UPDATE ON public.drivers FOR EACH ROW EXECUTE FUNCTION public.driver_trig_func();
 -   DROP TRIGGER driv_changes ON public.drivers;
       public          postgres    false    212    251            �           2620    98744    trans_duty duty_logs    TRIGGER     m   CREATE TRIGGER duty_logs AFTER DELETE ON public.trans_duty FOR EACH ROW EXECUTE FUNCTION public.duty_logs();
 -   DROP TRIGGER duty_logs ON public.trans_duty;
       public          postgres    false    254    224            �           2620    98603    jeep jeep_changes    TRIGGER     �   CREATE TRIGGER jeep_changes AFTER INSERT OR DELETE OR UPDATE ON public.jeep FOR EACH ROW EXECUTE FUNCTION public.jeep_trig_func();
 *   DROP TRIGGER jeep_changes ON public.jeep;
       public          postgres    false    216    252            �           2606    98739    trans_duty trans_duty_c_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.trans_duty
    ADD CONSTRAINT trans_duty_c_id_fkey FOREIGN KEY (c_id) REFERENCES public.conductors(conductor_id);
 I   ALTER TABLE ONLY public.trans_duty DROP CONSTRAINT trans_duty_c_id_fkey;
       public          postgres    false    224    3240    214            �           2606    98734    trans_duty trans_duty_d_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.trans_duty
    ADD CONSTRAINT trans_duty_d_id_fkey FOREIGN KEY (d_id) REFERENCES public.drivers(driver_id);
 I   ALTER TABLE ONLY public.trans_duty DROP CONSTRAINT trans_duty_d_id_fkey;
       public          postgres    false    212    3238    224            �           2606    98729    trans_duty trans_duty_v_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.trans_duty
    ADD CONSTRAINT trans_duty_v_id_fkey FOREIGN KEY (v_id) REFERENCES public.jeep(vehicle_id);
 I   ALTER TABLE ONLY public.trans_duty DROP CONSTRAINT trans_duty_v_id_fkey;
       public          postgres    false    3242    224    216            F   *   x�3�LL���3�Q^�y�����U�Ŝ!�I�y�\1z\\\ ,      J   �   x�M��
�0���W��6��-H}QЍ������Ԥ���Y	�9�p���}4)hP���Im[(РHС�sƗp
5z(,�Lh0y1%�+Ҭ�Z8}Ʋ8��:��i��U��D��"䌯���tP�k���'���@��t�������w[�?|��㴱{$��/�+L�      H   �   x�%̱�0F���h�{��HD4iGE��6��t>_1�6����1e8�]h�Ԃ��ڀ">�+��\�xO8�1��SL��8B\?����Xn�1���?#C��rL.s9u��Aۘ�ڛ���'      R     x����N1E��W�d4O��� AIc�"�&Ze���xM6R����g���@A
��Fxi_o�a3l۹���6���x�4�T��3��|i��ETs�9d0P�e=���q~o���?����p�M�d�dE}MN�=�H�)H���?[.�	#Qa]1�OtT7�� �A�=���.���ī�_�gK��o���n�i��\��U9FI�:҂%f,�l�k��<�i�}���aB���"Iմ�c��,����&��P��^%&&K�{��b9q�B����      N   �  x����n�@���S����]�[�]��f�ibŞA6&�O�c'M�E����ݧ����-<|!�"�M�ޥ���fE��s�-�!��eQ�lS�{�C�rqF�w&r�r�	�BK�)ڋr N�K@2�}�0�Nk3�zS̛C�����׭���c���P�jJ���i=�o�5F0M��aqr��:��YNqTH*2%:��~�_�.�>�`Yl}L8_�Sw�oۍ���#�:jL�d/��H��m�X�j�Fƌ���J�5Ƭ��IO�b��Z<y�����xM"���!h`|�������V~�W1�U�0��˔��`��� �E���r�x���h��Z�b �\�� OE��A��P�;��Q��r�� ש���u�1�\2�i
�2����@���;��3�-SUĴ:m:a<��%�+��@����[}�#�p-��W�+�8�b|���7U��r.���Ĭ!�,��"§�n��e��*A���V�v���;-*�E�v�cC�9��>�����7������q���M�;K妏�)����_c���BG[;�qd;~.h���2X��v]3����?�֭���g�ƚ\�nh�]f���;�͙&���Df�Nч
��g��fr�rαt6{ Y���=w      L   z   x�]ʻ�0 ���+�Co1�H�M4�Ƅ�V���89���^��*#n~����0�I�]-X�9�D{��[Tnr?T)JmI�`�8�>��Z?�"�e8�h��h��5���m�+j�"r      P   ^  x����N�@E��_���G�wy�G`����Ț��΂���`��Ԧ7���޺�a�Ls��ܮv�sb�,꺩�t�?}3 #����|2��i
,!(vP�M�����c{�^�Y#��%x�Vm76]���u;d�E2��J.*|<��x�$N[�ъ2����1+<�M�-����u�b��5	1��1D�����?�a�v�����z$��E��(�N9����I6Y�����|L����cAq�b�:��U�B���D6j4譊 �~X-��k�Y��� ����qI���)W����ߟ;X���\��`N��=���f�j"�v�d�F�6�Y+�� ^�%      T   ~   x���9�0 �z�
�֞�J� �4F�D
dA^�4L?�0�����������c�OYR����Y��V�:B�F18��e��]��2_��%7N1բL��������4�XP�fw�ι7oj(     