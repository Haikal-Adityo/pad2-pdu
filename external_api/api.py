import MySQLdb
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from datetime import datetime, timedelta

db_config = {
    'host': 'database',
    'user': 'root',
    'password': 'nanahira774',
    'database': 'drill_test'
}

conn = MySQLdb.connect(**db_config)
app = FastAPI()

class DrillData(BaseModel):
    id: int
    well_sensor_id: int
    data_date: str
    data_time: str
    bit_depth_m: int
    scfm: int
    mud_cond_in_mmho: int
    block_pos_m: int
    wob_klb: int
    bvdepth_m: int
    mud_cond_out_mmho: int
    torque_klbft: int
    rpm: int
    hkld_klb: int
    log_depth_m: int
    h2s_1_ppm: int
    mud_flow_outp: int
    totspm: int
    sp_press_psi: int
    mud_flow_in_gpm: int
    co2_1_perct: int
    gas_perct: int
    mud_temp_out_c: int
    mud_temp_in_c: int
    tank_vol_tot_bbl: int
    ropi_m_hr: int

class RequestBody(BaseModel):
    current_date_upper: str
    current_time_upper: str
    current_date_lower: str
    current_time_lower: str

@app.post("/drill_data/", response_model=list[DrillData])
# @app.post("/drill_data/", response_model=RequestBody)
def get_all(request: RequestBody):
    cursor = conn.cursor()
    cursor.execute(f"SELECT * FROM well_sensor_data WHERE (data_time < '{request.current_time_upper}') AND (data_time >= '{request.current_time_lower}');")
    rows = cursor.fetchall()
    cursor.close()
    if rows is None:
        raise HTTPException(status_code=404, detail="Item not found")
    
    drill_list = []
    for row in rows:

        data_time_str = row[2].strftime(r'%Y-%m-%d')
        hours, remainder = divmod(row[3].seconds, 3600)
        minutes, seconds = divmod(remainder, 60)
        data_time = f"{hours:02d}:{minutes:02d}:{seconds:02d}"

        drill = dict(zip(DrillData.__fields__.keys(), row))
        drill['data_date'] = data_time_str
        drill['data_time'] = data_time

        drill_list.append(drill)

    return drill_list



if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8020)
