--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.23
-- Dumped by pg_dump version 9.3.2
-- Started on 2016-09-27 15:56:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 187 (class 3079 OID 11653)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1990 (class 0 OID 0)
-- Dependencies: 187
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 162 (class 1259 OID 120670338)
-- Name: taxref_changes_30_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_30_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 161 (class 1259 OID 120670336)
-- Name: taxref_changes_30_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_30_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1991 (class 0 OID 0)
-- Dependencies: 161
-- Name: taxref_changes_30_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_30_utf8_ogc_fid_seq OWNED BY taxref_changes_30_utf8.ogc_fid;


--
-- TOC entry 164 (class 1259 OID 120670349)
-- Name: taxref_changes_40_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_40_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 163 (class 1259 OID 120670347)
-- Name: taxref_changes_40_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_40_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1992 (class 0 OID 0)
-- Dependencies: 163
-- Name: taxref_changes_40_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_40_utf8_ogc_fid_seq OWNED BY taxref_changes_40_utf8.ogc_fid;


--
-- TOC entry 166 (class 1259 OID 120670360)
-- Name: taxref_changes_50_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_50_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 165 (class 1259 OID 120670358)
-- Name: taxref_changes_50_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_50_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1993 (class 0 OID 0)
-- Dependencies: 165
-- Name: taxref_changes_50_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_50_utf8_ogc_fid_seq OWNED BY taxref_changes_50_utf8.ogc_fid;


--
-- TOC entry 168 (class 1259 OID 120670371)
-- Name: taxref_changes_60_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_60_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 167 (class 1259 OID 120670369)
-- Name: taxref_changes_60_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_60_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1994 (class 0 OID 0)
-- Dependencies: 167
-- Name: taxref_changes_60_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_60_utf8_ogc_fid_seq OWNED BY taxref_changes_60_utf8.ogc_fid;


--
-- TOC entry 170 (class 1259 OID 120670382)
-- Name: taxref_changes_70_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_70_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 169 (class 1259 OID 120670380)
-- Name: taxref_changes_70_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_70_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1995 (class 0 OID 0)
-- Dependencies: 169
-- Name: taxref_changes_70_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_70_utf8_ogc_fid_seq OWNED BY taxref_changes_70_utf8.ogc_fid;


--
-- TOC entry 186 (class 1259 OID 219515386)
-- Name: taxref_changes_80_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxref_changes_80_utf8 (
    ogc_fid integer NOT NULL,
    cd_nom character varying,
    num_version_init character varying,
    num_version_final character varying,
    champ character varying,
    valeur_init character varying,
    valeur_final character varying,
    type_change character varying
);


--
-- TOC entry 185 (class 1259 OID 219515384)
-- Name: taxref_changes_80_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxref_changes_80_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1996 (class 0 OID 0)
-- Dependencies: 185
-- Name: taxref_changes_80_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxref_changes_80_utf8_ogc_fid_seq OWNED BY taxref_changes_80_utf8.ogc_fid;


--
-- TOC entry 172 (class 1259 OID 120670393)
-- Name: taxrefv20_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv20_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    cd_nom character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    cd_ref character varying,
    nom_valide character varying,
    rang character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    fr character varying,
    mar character varying,
    gua character varying,
    smsb character varying,
    gf character varying,
    spm character varying,
    reu character varying,
    may character varying,
    taaf character varying
);


--
-- TOC entry 171 (class 1259 OID 120670391)
-- Name: taxrefv20_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv20_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1997 (class 0 OID 0)
-- Dependencies: 171
-- Name: taxrefv20_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv20_utf8_ogc_fid_seq OWNED BY taxrefv20_utf8.ogc_fid;


--
-- TOC entry 174 (class 1259 OID 120670404)
-- Name: taxrefv30_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv30_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    smsb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    nc character varying,
    wf character varying,
    pf character varying,
    cli character varying,
    nom_complet character varying
);


--
-- TOC entry 173 (class 1259 OID 120670402)
-- Name: taxrefv30_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv30_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1998 (class 0 OID 0)
-- Dependencies: 173
-- Name: taxrefv30_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv30_utf8_ogc_fid_seq OWNED BY taxrefv30_utf8.ogc_fid;


--
-- TOC entry 176 (class 1259 OID 120670415)
-- Name: taxrefv40_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv40_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    sm character varying,
    sb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    pf character varying,
    nc character varying,
    wf character varying,
    cli character varying,
    aphia_id character varying
);


--
-- TOC entry 175 (class 1259 OID 120670413)
-- Name: taxrefv40_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv40_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 1999 (class 0 OID 0)
-- Dependencies: 175
-- Name: taxrefv40_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv40_utf8_ogc_fid_seq OWNED BY taxrefv40_utf8.ogc_fid;


--
-- TOC entry 178 (class 1259 OID 120670426)
-- Name: taxrefv50_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv50_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    sm character varying,
    sb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    pf character varying,
    nc character varying,
    wf character varying,
    cli character varying,
    url character varying
);


--
-- TOC entry 177 (class 1259 OID 120670424)
-- Name: taxrefv50_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv50_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2000 (class 0 OID 0)
-- Dependencies: 177
-- Name: taxrefv50_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv50_utf8_ogc_fid_seq OWNED BY taxrefv50_utf8.ogc_fid;


--
-- TOC entry 180 (class 1259 OID 120670437)
-- Name: taxrefv60_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv60_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    sm character varying,
    sb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    pf character varying,
    nc character varying,
    wf character varying,
    cli character varying,
    url character varying
);


--
-- TOC entry 179 (class 1259 OID 120670435)
-- Name: taxrefv60_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv60_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2001 (class 0 OID 0)
-- Dependencies: 179
-- Name: taxrefv60_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv60_utf8_ogc_fid_seq OWNED BY taxrefv60_utf8.ogc_fid;


--
-- TOC entry 182 (class 1259 OID 120670448)
-- Name: taxrefv70_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv70_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    group1_inpn character varying,
    group2_inpn character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    sm character varying,
    sb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    pf character varying,
    nc character varying,
    wf character varying,
    cli character varying,
    url character varying
);


--
-- TOC entry 181 (class 1259 OID 120670446)
-- Name: taxrefv70_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv70_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2002 (class 0 OID 0)
-- Dependencies: 181
-- Name: taxrefv70_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv70_utf8_ogc_fid_seq OWNED BY taxrefv70_utf8.ogc_fid;


--
-- TOC entry 184 (class 1259 OID 219515348)
-- Name: taxrefv80_utf8; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE taxrefv80_utf8 (
    ogc_fid integer NOT NULL,
    regne character varying,
    phylum character varying,
    classe character varying,
    ordre character varying,
    famille character varying,
    group1_inpn character varying,
    group2_inpn character varying,
    cd_nom character varying,
    cd_taxsup character varying,
    cd_ref character varying,
    rang character varying,
    lb_nom character varying,
    lb_auteur character varying,
    nom_complet character varying,
    nom_valide character varying,
    nom_vern character varying,
    nom_vern_eng character varying,
    habitat character varying,
    fr character varying,
    gf character varying,
    mar character varying,
    gua character varying,
    sm character varying,
    sb character varying,
    spm character varying,
    may character varying,
    epa character varying,
    reu character varying,
    taaf character varying,
    pf character varying,
    nc character varying,
    wf character varying,
    cli character varying,
    url character varying,
    nom_complet_html character varying
);


--
-- TOC entry 183 (class 1259 OID 219515346)
-- Name: taxrefv80_utf8_ogc_fid_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE taxrefv80_utf8_ogc_fid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2003 (class 0 OID 0)
-- Dependencies: 183
-- Name: taxrefv80_utf8_ogc_fid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE taxrefv80_utf8_ogc_fid_seq OWNED BY taxrefv80_utf8.ogc_fid;


--
-- TOC entry 1844 (class 2604 OID 120670341)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_30_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_30_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1845 (class 2604 OID 120670352)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_40_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_40_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1846 (class 2604 OID 120670363)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_50_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_50_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1847 (class 2604 OID 120670374)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_60_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_60_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1848 (class 2604 OID 120670385)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_70_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_70_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1856 (class 2604 OID 219515389)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxref_changes_80_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxref_changes_80_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1849 (class 2604 OID 120670396)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv20_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv20_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1850 (class 2604 OID 120670407)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv30_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv30_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1851 (class 2604 OID 120670418)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv40_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv40_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1852 (class 2604 OID 120670429)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv50_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv50_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1853 (class 2604 OID 120670440)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv60_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv60_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1854 (class 2604 OID 120670451)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv70_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv70_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1855 (class 2604 OID 219515351)
-- Name: ogc_fid; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY taxrefv80_utf8 ALTER COLUMN ogc_fid SET DEFAULT nextval('taxrefv80_utf8_ogc_fid_seq'::regclass);


--
-- TOC entry 1858 (class 2606 OID 120670346)
-- Name: taxref_changes_30_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_30_utf8
    ADD CONSTRAINT taxref_changes_30_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1860 (class 2606 OID 120670357)
-- Name: taxref_changes_40_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_40_utf8
    ADD CONSTRAINT taxref_changes_40_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1862 (class 2606 OID 120670368)
-- Name: taxref_changes_50_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_50_utf8
    ADD CONSTRAINT taxref_changes_50_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1864 (class 2606 OID 120670379)
-- Name: taxref_changes_60_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_60_utf8
    ADD CONSTRAINT taxref_changes_60_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1866 (class 2606 OID 120670390)
-- Name: taxref_changes_70_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_70_utf8
    ADD CONSTRAINT taxref_changes_70_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1882 (class 2606 OID 219515394)
-- Name: taxref_changes_80_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxref_changes_80_utf8
    ADD CONSTRAINT taxref_changes_80_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1868 (class 2606 OID 120670401)
-- Name: taxrefv20_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv20_utf8
    ADD CONSTRAINT taxrefv20_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1870 (class 2606 OID 120670412)
-- Name: taxrefv30_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv30_utf8
    ADD CONSTRAINT taxrefv30_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1872 (class 2606 OID 120670423)
-- Name: taxrefv40_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv40_utf8
    ADD CONSTRAINT taxrefv40_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1874 (class 2606 OID 120670434)
-- Name: taxrefv50_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv50_utf8
    ADD CONSTRAINT taxrefv50_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1876 (class 2606 OID 120670445)
-- Name: taxrefv60_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv60_utf8
    ADD CONSTRAINT taxrefv60_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1878 (class 2606 OID 120670456)
-- Name: taxrefv70_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv70_utf8
    ADD CONSTRAINT taxrefv70_utf8_pk PRIMARY KEY (ogc_fid);


--
-- TOC entry 1880 (class 2606 OID 219515356)
-- Name: taxrefv80_utf8_pk; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY taxrefv80_utf8
    ADD CONSTRAINT taxrefv80_utf8_pk PRIMARY KEY (ogc_fid);


-- Completed on 2016-09-27 15:56:31

--
-- PostgreSQL database dump complete
--

